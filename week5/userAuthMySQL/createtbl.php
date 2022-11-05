<?php
include 'config.php';

//This code is not compatible with my SQL Installation
// $sqltbl = "CREATE TABLE Students(
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     full_names VARCHAR(120) NOT NULL,
//     country VARCHAR(32) NOT NULL,
//     email VARCHAR(60),
//     gender VARCHAR(10),
//     pwd VARCHAR(18),
// )";

// if ($conn) {
//     if (mysqli_query($conn, $sqltbl)) {
//         echo "Table Students created successfully";
//     } else {
//         echo "Error creating table:" . mysqli_error($conn);
//     }
//     mysqli_close($conn);
// }

//This code is compatible with my MSQL Installation
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE Students2 (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
full_names VARCHAR(120) NOT NULL,
country VARCHAR(32) NOT NULL,
email VARCHAR(60),
gender VARCHAR(10),
pwd VARCHAR(30),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";


if ($conn->query($sql) === TRUE) {
    echo "Table Students2 created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

?>