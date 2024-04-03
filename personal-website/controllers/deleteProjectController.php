
<?php
    session_start();
    require_once("../core/functions.php");
    require_once("../core/validations.php");
    require_once("../helpers/dataFunctions.php");
    if (checkRequestMethod("POST")) deleteProject($_POST['id']);
    redirect('./../projects.php');
?>