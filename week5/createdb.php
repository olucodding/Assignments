<?php
//include the connection
//include 'config.php';
include "config.php";

//create database query
$sql = "create database zuriphp";

if ($conn) {
    if (mysqli_query($conn, $sql)) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}


?>