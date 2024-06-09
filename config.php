<?php

$host = "localhost";
$user = "root";
$password = "";
$dbName = "blog_web";

$config = new mysqli($host, $user, $password, $dbName);

if (!$config) {
    die("connection is undefined" . mysqli_connect_errno());
} 





?>