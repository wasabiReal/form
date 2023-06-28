<?php

namespace app\controllers;

use vendor\core\App;

class AppController extends \vendor\core\base\Controller{

    public function __construct($route)
    {
        parent::__construct($route);
        new \app\models\Main;
    }

}