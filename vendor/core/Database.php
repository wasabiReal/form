<?php

namespace vendor\core;

class DataBase
{

    protected $pdo;
    protected static $instance;

    protected function __construct()
    {
        $db = require ROOT . '/config/configdatabase.php';
        require LIBS . '/rb.php';
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass']);
    }

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function execute($sql){
        $stm = $this->pdo->prepare($sql);
        return $stm->execute();
    }

    public function query($sql){
        $smt = $this->pdo->prepare($sql);
        $res = $smt->execute();
        if($res !== false){
            return $smt->fetchAll();
        }
        return [];
    }

}