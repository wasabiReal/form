<?php

require_once '..\..\..\vendor\libs\rb.php';
$db = require_once '..\..\..\config\configdatabase.php';
\R::setup($db['dsn'], $db['user'], $db['pass']);

use vendor\core\DataBase;

if (isset($_POST['submit'])) {

    $first_name = $_POST['fn'];
    $last_name = $_POST['ln'];
    $birthdate = $_POST['birthdate'];
    $report = $_POST['report'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $position = $_POST['position'];
    $about = $_POST['about'];

    $form = \R::dispense('participants');
    $form->first_name = $_POST['fn'];
    $form->last_name = $_POST['ln'];
    $form->birthdate = $_POST['birthdate'];
    $form->report = $_POST['report'];
    $form->country = $_POST['country'];
    $form->phone = $_POST['phone'];
    $form->email = $_POST['email'];
    $form->company = $_POST['company'];
    $form->position = $_POST['position'];
    $form->about = $_POST['about'];

    $id = \R::store($form);

    print_r($id);

};
