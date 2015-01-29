<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz
 * Date: 2013-05-23
 * Time: 16:32
 * @author ARhae <antoni.rhae@gmail.com>
 */

/** Class for making database operation less painful :) */
class DbHelper {

    private static $_config = array(
        'host' => 'localhost',
        'user' => '16023451_helper',
        'pass' => 'y;kgtPEd^iCB',
        'db'   => '16023451_helper',
    );

    private static $instance = array();

    private static $_dbconnection = null;

    /** Instance */
    public static function init($table_name)
    {
        // Connect to database
        self::createDatabaseConnection();

        # Lets check i
    }

//    private function query

    /** init db connection */
    private static function createDatabaseConnection()
    {
        // ff there is no connection - establish it
        if (is_null(self::$_dbconnection))
        {
            // STFU - veteran way to supress error
            $mysqli = @new mysqli(self::$_config['host'], self::$_config['user'], self::$_config['pass'], self::$_config['db']);
            if ($mysqli->connect_errno) {
                throw new Exception('Could not connect to MySQL: (' . $mysqli->connect_errno . '): ' . $mysqli->connect_error);
            }
        }
    }

    /** check if table exists and return detailed data */
    private static function fetchTableStructure($table_name)
    {

    }
}

try
{
    DbHelper::init('user');
} catch (Exception $exception)
{
    exit ($exception->getMessage());
}