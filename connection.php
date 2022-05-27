<?php


$name = "localhost";
$username = "root";
$password = "";
$db = "registrar_db";

$connect = mysqli_connect($name, $username, $password, $db);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
    
  }else{

    
  }