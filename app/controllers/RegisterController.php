<?php

namespace app\controllers;
use app\models\Main;
use vendor\core\App;

class RegisterController extends AppController {

    public function indexAction() {
        $model = new Main;
        $title = 'Register';
        $share = require ROOT . '\config\share.php';
        $this->set(compact('title', 'share'));
    }

}

