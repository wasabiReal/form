<?php

$db = require  '..\..\..\config\configdatabase.php';
require '..\..\..\vendor\libs\rb.php';
\R::setup($db['dsn'], $db['user'], $db['pass']);
require '..\..\..\vendor\libs\debug.php';

define("ALLOWED_SIZE",   2097152);    // CHANGE ALLOWED SIZE AS YOUR NEED
define("SAVED_DIRECTORY", "../images/"); // CHANGE SAVED DIRECTORY AS YOUR NEED

$allowed_extensions = array("jpeg", "jpg", "png");

if (! empty($_POST)) {

    if(isset($_FILES['image'])){
        $errors = array();

        $uploaded_file_name = $_FILES['image']['name'];
        $uploaded_file_size = $_FILES['image']['size'];
        $uploaded_file_tmp  = $_FILES['image']['tmp_name'];
        $uploaded_file_type = $_FILES['image']['type'];

        $file_compositions = explode('.', $uploaded_file_name);
        $file_ext = strtolower(end($file_compositions));

        $saved_file_name = $uploaded_file_name; // CHANGE FILE NAME AS YOUR NEED

        if(in_array($file_ext, $allowed_extensions) === false)
            $errors[] = 'Extension not allowed, please choose a JPEG, JPG or PNG file';

        if($uploaded_file_size > ALLOWED_SIZE)
            $errors[] = 'File size is too big';

        if(empty($errors) == true) { // if no error, uploaded image is valid
            move_uploaded_file($uploaded_file_tmp, SAVED_DIRECTORY . $saved_file_name);
        } else {
            print_r($errors);
        }
    }

    $form = \R::dispense('participants');
    $form->company = $_POST['company'];
    $form->position = $_POST['position'];
    $form->about = $_POST['about'];
    if($_FILES['image']['name'] == ''){
        $form->image = 'default_image.png';
    }else{
        $form->image = $_FILES['image']['name'];
    }

    $id = \R::store($form);

};
