<?php

$host = "localhost";
$user = "root";
$db_password = "";
$dbName = "blog_web";

$config = new mysqli($host, $user, $db_password, $dbName);

if (!$config) {
    die("connection is undefined" . mysqli_connect_errno());
}
