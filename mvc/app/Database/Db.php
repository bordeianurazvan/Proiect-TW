<?php

/**
 * Created by PhpStorm.
 * User: Tudor
 * Date: 5/27/2017
 * Time: 2:41 PM
 */
class Db
{
    private const host = "//localhost/xe";
    private const db_name = "ProiectTw";
    private const username = "admintw";
    private const password = "ADMINTW";
    private static $instance;

    private function __construct()
    {
    }

    private function __clone()
    {

    }

    public static function getDbInstance()
    {

        if (!isset(self::$instance)) {
            self::$instance = oci_connect(SELF::username, SELF::password, SELF::host);
            if (self::$instance == false) {
                throw new Exception('Oracle connection failed: ');
            }

        }
        return self::$instance;

    }
}