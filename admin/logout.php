<?php session_start()?>

<?php
include "../config.php";
session_unset();
session_destroy();
header("location:http://localhost/Blog/Login.php");
exit();
 
 
 ?>
