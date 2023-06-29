<?php

namespace app\controllers;
use app\models\Main;
use vendor\core\App;

class MembersController extends AppController {

    public function indexAction() {
        $model = new Main;
    }

}

