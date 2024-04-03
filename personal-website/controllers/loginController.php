<?php
session_start();
require_once("../core/functions.php");
require_once("../core/validations.php");
require_once("../helpers/dataFunctions.php");
$errors= [];

if (checkRequestMethod("POST")){
    foreach($_POST as $key => $value):
        $$key =sanitizeValue($value);
    endforeach;


//validations for email
if (!requireValue($email)):
    $errors[] = "Email is required";
elseif (valEmail($email)):
    $errors[] = "Email is not valid";
endif;
//validations for password
if (!requireValue($password)):
    $errors[] = "Password is required";
endif;

if (empty($errors)){
    $data = readData('./../data/adminData.json');
    for ($i = 0; $i < count($data); $i++)
    {
        unset($errors);
        foreach ($data[$i] as $key => $value){
            $$key = sanitizeValue($value);
        }
        if ($admin == 1 && $email == $lemail && $password == $lpassword)
        {
            $_SESSION['auth']=$data[$i];
            redirect('./../index.php');
            break;
         //hzhrlo el 7agat elly el admin hyshofha
        }
        else if ($admin== 0 && $lemail == $email &&$lpassword==$password){
            $_SESSION['auth']=$data[$i];
            redirect('./../index.php');
            break;
         //hzhrlo el 7agat elly el user hyshofha
        }
        else {
            $errors[]="Invalid Email or Password";
        }
    }
if (!empty($errors)){
    $_SESSION['errors']= $errors;
    redirect("./../login.php");
}

}
else{
    $_SESSION['errors']= $errors;
    redirect("./../login.php");
}

}
else{
    die ("ايه اللي جايبك هنا يا صاحبي");
}