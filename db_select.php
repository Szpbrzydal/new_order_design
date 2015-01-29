<?php

/**
 * Class Dao_Diet_Profile
 * Klasa zawierajaca metody zarzadzania danymi uzytkownika Detocell
 */
class Dao_Diet_Profile extends Dao {

    /**
     * @param $data
     * Import diet do bazy danych
     */
    public static function makeImport($data)
    {
        Debug_Console::table($_POST);

        $data = $_POST['diet_profile'];
        $diet_profile_meal_data = $_POST['diet_profile_meal_need'];

        $diet_profile = array(
            'name'             => $data['name'],
            'is_vegetarian'    => 0,
            'calories_from'    => $data['calories_from'],
            'calories_to'      => $data['calories_to'],
            'created_at'       => date('Y-m-d H:i:s'),
            'created_by'       => 1,
            'updated_at'       => date('Y-m-d H:i:s'),
            'updated_by'       => 1,
            'diet_profile_day' => array(),
        );

        $day = 0;

        $threat = null;

        # Meal types:
        $threat_id = array(
            1 => 'Śniadanie',
            2 => 'Drugie śniadanie',
            3 => 'Obiad',
            4 => 'Podwieczorek',
            5 => 'Kolacja',
        );
        $threat_name = array_flip($threat_id);

        foreach ($_FILES['diet']['tmp_name'] as $k => $filename)
        {
            $original_name = strtolower($_FILES['diet']['name'][$k]);
            preg_match('/([a-z]{1,1})([0-9]+)(w{0,1})/', $original_name, $matches);

            $day = (int)$matches[2];
            if (empty($diet_profile['name']))
            {
                $diet_profile['name'] = $matches[1];
            }

            if ($matches[3] == 'w')
            {
                $diet_profile['is_vegetarian'] = 1;
            }


            $diet_profile['diet_profile_day'][$day] = array(
                'day' => $day,
                'diet_profile_day_meal' => array(),
            );

            $output = __DIR__ . '/tmp/report_excel.xlsx';
            move_uploaded_file($filename, $output);

            /**/
            Report_Excel::factory($output)
                ->defaults(array(
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                    NULL,
                ))
                ->processor(function ($r) use (&$diet_profile, $threat_name, $day, &$threat)
                {
                    switch (true)
                    {
                        case !empty($r[0]) && in_array($r[0], array_keys($threat_name)):
                            $threat = $threat_name[$r[0]];
                            $diet_profile['diet_profile_day'][$day]['diet_profile_day_meal'][$threat] = array(
                                'name'        => $r[0],
                                'meal_type'   => $threat,
                                'make_time'   => null,
                                'instruction' => null,
                                'ingredients' => array(),
                            );
                            break;

                        case !is_null($threat):
                            if (empty($r[0]) && empty($r[1]) && empty($r[5]) && $r[3] != 'Przyprawy')
                            {
                                return;
                            }

                            # Nazwa posiłku
                            if (!empty($r[5]))
                            {
                                $diet_profile['diet_profile_day'][$day]['diet_profile_day_meal'][$threat]['name'] = $r[5];
                            }

                            # Czas przygotowania
                            if (!empty($r[6]))
                            {
                                $diet_profile['diet_profile_day'][$day]['diet_profile_day_meal'][$threat]['make_time'] = $r[6];
                            }

                            # Sposób przygotowania
                            if (!empty($r[7]))
                            {
                                $diet_profile['diet_profile_day'][$day]['diet_profile_day_meal'][$threat]['instruction'] = $r[7];
                            }

                            $diet_profile['diet_profile_day'][$day]['diet_profile_day_meal'][$threat]['ingredients'][] = array(
                                'weight'      => (int)$r[1],
                                'weight_unit' => $r[2],
                                'name'        => $r[3],
                                'home_unit'   => $r[4],
                            );
                            break;
                    }
                } )->process();
        }

        $diet_profile_day = $diet_profile['diet_profile_day'];
        unset($diet_profile['diet_profile_day']);

        if (empty($data['id']))
        {
            $diet = new Model_Diet_Profile();
            $diet->values($diet_profile);
            $diet->create();

            # Wrzucamy zapotrzebowanie na konkretne posilki
            $calories = 0;
            foreach($diet_profile_meal_data as $meal_type => $diet_profile_meal_data_entry)
            {
                $calories += $diet_profile_meal_data_entry;
                $diet_profile_meal = new Model_Diet_Profile_Meal();
                $diet_profile_meal->meal_type = $meal_type;
                $diet_profile_meal->diet_profile_id = $diet->id;
                $diet_profile_meal->calories = $diet_profile_meal_data_entry;

                $diet_profile_meal->create();
            }

            # Aktualizujemy zapotrzebowanie kaloryczne na wszystko w ciagu dnia
            $diet->calories = $calories;
            $diet->update();
        } else {
            $diet = Dao_Diet_Profile::factory()->find_one(array('id' => $data['id']));
        }

        foreach ($diet_profile_day as $dpd_data)
        {
            $diet_profile_day_meal = $dpd_data['diet_profile_day_meal'];
            $dpd_data['profile_id'] = $diet->id;
            unset($dpd_data['diet_profile_day_meal']);
            $dpd = new Model_Diet_Profile_Day();
            $dpd->values($dpd_data);
            $dpd->create();

            foreach($diet_profile_day_meal as $dpdm_data)
            {
                $dpdm_data['day_id'] = $dpd->id;
                $dpdm_data['make_time'] = (int)$dpdm_data['make_time'];
                $dpdm_data['instruction'] = (string)$dpdm_data['instruction'];
                $dpdm_data['ingredients'] = json_encode($dpdm_data['ingredients']);

                $dpdm = new Model_Diet_Profile_Day_Meal();
                $dpdm->values($dpdm_data);
                $dpdm->create();
            }
        }
    }

    /**
     * @return float
     * Wyliczamy dzienne zapotrzebowanie na kalorie na podstawie zadanych parametrow
     */
    public function calculateCalories()
    {
        $user = Auth::instance()->get_user();
        $diet = Dao_Diet::factory()->getDiet();
        $diet_params = new Model_Diet_Params();
        $diet_params = $diet_params->where('user_id', '=', $user->id)
            ->find();


        $profile = new Model_Profile();
        $profile->where('user_id', '=', $user->id)->find();

        $age = abs(1970 - (int)date('Y', abs(time() - strtotime($profile->birth_year))));
        $bmi = round($diet_params->weight / (($profile->height / 100) * ($profile->height / 100)), 1);

        # KROK 1 - liczymy zapotrzebowanie ze wzgledu na wiek, wage oraz wzrost
        $calories = round(665.1 + (9.567 * $diet_params->weight) + (1.85 * $profile->height) - (4.68 * $age));

        # KROK 2 - mnozymy przez zadana dzienna aktywnosc
        $calories_multiply = 1;
        switch($diet->activity)
        {
            # Niska aktywnosc, otylosc (BMI >= 30)
            case 0:
                if ($bmi >= 30)
                {
                    $calories_multiply = 1.2;
                }
                break;
            # Niska aktywnosc
            case 1:
                $calories_multiply = 1.4;
                break;
            # Srednia aktywnosc
            case 2:
                $calories_multiply = 1.5;
                break;
            # Intensywna aktywnosc
            case 3:
                $calories_multiply = 1.7;
                break;
            # Bardzo wysoka intensywnosc aktywnosci
            case 4:
                $calories_multiply = 2.0;
                break;
        }

        # KROK 3 - dodajemy badz odejmujemy stala ilosc kalorii w zaleznosci od bmi
        $extra_calories = 0;
        switch(true)
        {
            case $bmi < 18.5:
                $extra_calories = 200;
                break;
            case $bmi >= 18.5 && $bmi < 25:
                $extra_calories = 0;
                break;
            case $bmi >= 25 && $bmi < 30:
                $extra_calories = -300;
                break;
            case $bmi >= 30:
                $extra_calories = -500;
                break;
        }

        $calories = $calories * $calories_multiply + $extra_calories;

        return $calories;
    }

    /**
     * @param null $date
     * @return int
     * Wyliczamy zapotrzebowanie dzienne na spozyci wody
     */
    public function calculateHydration($date = null)
    {
        $diet_params = Dao_Diet::factory()->getParams($date);
        $hydration = 30 * $diet_params->weight;
        return $hydration - ($hydration % 250);
    }
}
