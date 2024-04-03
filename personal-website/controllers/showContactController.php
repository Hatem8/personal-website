
<?php
    session_start();
    require_once("../core/functions.php");
    require_once("../core/validations.php");
    require_once("../helpers/dataFunctions.php");
    deleteContact($_POST['id']);
    redirect('./../showContact.php');
?>