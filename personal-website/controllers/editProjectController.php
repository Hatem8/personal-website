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
//validations for project name
    if (!requireValue($name))  $errors[] = "Project name is required";   
//validations for description
    if (!requireValue($desc)) $errors[] = "Description is required";
//validations for photo
    $file = $_FILES['image'];
    $f_name = $file['name'];
    $f_type = $file['type'];
    $f_tmp_name = $file['tmp_name'];
    $f_error = $file['error'];
    $f_size = $file['size'];
    if ($f_name != '')
    {
    $ext = pathinfo($f_name);
    $file_name = $ext['filename'];
    $file_ext = $ext['extension'];
    $allowed_ext = array("png","jpg","jpeg","gif");
    if (!in_array($file_ext, $allowed_ext)){    
        $errors[] = "Your File Not Allowed";
    }
    else if($f_error !== 0){ 
        $errors[] = "You Have An Error";
    }
    else if($f_size >1000000){
        $errors[] = "Your File is too Big";
    }
    else {
        $new_name= uniqid('',true).".".$file_ext;
        $destnation= './../assets/projectsPhotos/'.$new_name;
        $dest= './assets/projectsPhotos/'.$new_name;
        move_uploaded_file($f_tmp_name,$destnation);
    }
    }
    else{
      $errors[] = 'Please Choose image ';
      }
      if(empty($errors)){
        $newProject = [$id , $name , $desc , $dest];
        updateProject($newProject);
        redirect('./../projects.php');
    }
    else{
        $_SESSION['errors']= $errors;
        redirect("./../editProject.php?id=$id");
    }
}

else {
  die ("ايه اللي جايبك هنا يا صاحبي");
}

?>