<?php



//setting configuration
function db(){
$host = "127.0.0.1";
$user = "root";
$db = "zuriphp2";
$password = "";

//parse db connection argument
$conn = mysqli_connect($host, $user, $password, $db);
if (!$conn) {
    die("error connecting to Database:");
} 
return $conn;
}