<?php
/**
 * Created by PhpStorm.
 * User: grzegorzgurzeda
 * Date: 08/09/14
 * Time: 19:22
 */

require_once __DIR__ . '/../../core/baseject/baseject.php';

class User extends baseject\Baseject {
    /**
     * @var array
     */
    public static $model = array(
        'columns' => array(
            'id' => array(
                'primary'       => true,
                'autoincrement' => true,
                'null'          => false,
                'type'          => 'integer',
            ),
            'login' => array(
                'null' => false,
                'type' => 'string',
                'validate' => array(
                    'baseject\Validator',
                    'email',
                ),
            ),
        ),
    );
} 