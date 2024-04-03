
<?php 
session_start();
require_once './core/functions.php';
session_unset();
session_destroy();
redirect('login.php');
?>