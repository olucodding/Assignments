<?php



//setting configuration
$host = "127.0.0.1";
$user = "root";
$db = "zuriphp";
$password = "";

//parse db connection argument
$conn = mysqli_connect($host, $user, $password, $db);
if (!$conn) {
    die("error connecting to DatabaseD:");
} else {
    echo "Connected to database successfully";

}