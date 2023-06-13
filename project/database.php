<?php
$host = "localhost";
$dbname = "login";
$UserName = "root";
$password = "";

$mysqli = new mysqli($host, $UserName, $password, $dbname);
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;