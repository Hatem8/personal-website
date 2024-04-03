<?php
session_start();
require_once("../core/functions.php");
require_once("../core/validations.php");
require_once("../helpers/dataFunctions.php");
$errors= [];
$success=[];
if (checkRequestMethod("POST")){
    foreach($_POST as $key => $value):
        $$key =sanitizeValue($value);
    endforeach;

//validations for fullname
if (!requireValue($name))  $errors[] = "Full name is required";   
//validations for email
if (!requireValue($email)):
    $errors[] = "Email is required";
elseif (valEmail($email)):
    $errors[] = "Email is not valid";
endif;
//validations for password
if (!requireValue($phone)) $errors[] = "Phone is required";
if (!requireValue($message)) $errors[] = "Phone is required";

if (empty($errors)){
    $currentContact = [$name,$email, $phone, $message];
    writeContactUs($currentContact);
    $success[] = "Successfully Done";
    $_SESSION['success']=$success;
    redirect("./../contact.php");

}
else{
    $_SESSION['errors']= $errors;
    redirect("./../contact.php");
}

}
else{
    die ("ايه اللي جايبك هنا يا صاحبي");
}