<?php

namespace vendor\core;

class DataBase
{

    protected $pdo;
    protected static $instance;
    public static $countsql = 0;
    public static $queries = [];

    protected function __construct()
    {
        $db = require ROOT . '/config/configdatabase.php';
        require LIBS . '/rb.php';
        \R::setup($db['dsn'], $db['user'], $db['pass']);
    }

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

}