<?php

class Import {
    private static $host = 'www.stacjebenzynowe.pl';
    private static $url = '/ajaxfile.php';

    private static $companies;

    public static function setUp($param, $value)
    {
        self::${$param} = $value;
    }

    public function __construct()
    {
        foreach (self::$companies as $cid => $company)
        {
           $stations = self::parseStationList($cid);
        }
    }



    private static function makeRequest(array $params)
    {
        $header = array(
            'Connection: keep-alive',
            'Origin: http://' . self::$host,
            'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36',
            'Content-Type: application/x-www-form-urlencoded',
            'Accept: */*',
            'Referer: http://' . self::$host . '/',
            'Accept-Language: pl-PL,pl;q=0.8,en-US;q=0.6,en;q=0.4',
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$host . self::$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $data = curl_exec($ch);

        return $data;
    }

    private static function parseStationList($cid)
    {
        $data = file_get_contents("http://" . self::$host . "/GMxml.php?t=sieci&id_sieci={$cid}");
        $dom = new DOMDocument();
        $dom->loadXML($data);


        //exit(print_r($data,1));

        $xpath = new DOMXpath($dom);
        $elements = $xpath->query("//marker");

        # <marker lat="51.75675" lon="18.06033" title="LOTOS - Kalisz, Podmiejska 41" icon="chmurka-lotos.gif" dymekfoto="<TABLE width='170px' border=0 cellpadding='3' cellspacing='0'><TR><TD colspan=2 class='normalblack'><B>LOTOS - Kalisz, Podmiejska 41</B><DIV align=right style='margin-top:8px'><A class='linkniebieski' href='stacja.php?gs=S0w7woDummhRBmtLmG4L'>zobacz ceny &raquo;</A></DIV></TD></TR></TABLE>"/>
        foreach ($elements as $element) {
            preg_match('/href=\'stacja\.php\?gs=(.+)\'/u', $element->getAttribute('dymekfoto'), $gs);
            $lat = $element->getAttribute('lat');
            $lng = $element->getAttribute('lon');
            $gs = $gs[1];

            $data = self::fetchStation($gs);

            $station = array(
                'gs'  => $gs,
                'lat' => $lat,
                'lng' => $lng,
                'service' => $data['service'],
                'address' => $data['address'],
            );

            exit('<pre>' . print_r($station,1));
        }
    }

    private static function fetchStation($gs)
    {

        $data = array();

        # Services
        $params = array(
            'mod' => 'uslugistacji',
            'gs' => $gs,
        );
        $raw_data = self::makeRequest($params);

        $dom = new DOMDocument();
        @$dom->loadHTML($raw_data);
        $xpath = new DOMXpath($dom);
        $elements = $xpath->query("*/table/tr/td/div/img");

        foreach ($elements as $element) {
            $data['service'][self::sanitize($element->getAttribute('alt'))] = array(
                'service' => trim($element->getAttribute('alt')),
                'active'  => strpos($element->getAttribute('src'), 'szary') === FALSE ? true : false,
            );
        }

        # Adres
        $params = array(
            'mod' => 'adrestacji',
            'gs' => $gs,
        );
        $raw_data = self::makeRequest($params);

        $dom = new DOMDocument();
        @$dom->loadHTML($raw_data);
        $xpath = new DOMXpath($dom);
        $elements = $xpath->query("*/div/div");

        foreach ($elements as $element) {
            $data['address'] = $element->textContent;
        }


        return $data;
    }

    private static function map()
    {

    }

    private static function sanitize($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text))
        {
            return '';
        }

        return $text;
    }
}