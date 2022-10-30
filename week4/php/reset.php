<?php
session_start();

if (isset($_POST['submit'])) {
    $username = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $updatedpassword = trim($_POST['password']);

    if (resetPassword($email, $updatedpassword)) {
        print "You have successfully reset your password";
        print '<meta http-equiv="refresh" content="2; url=../forms/login.html">';
    } else
        print "The user name you have entered does not exist!";

}

function resetPassword($email, $updatedpassword)
{

    //opening file  to read and check if the username exists

    $sql = "../storage/users.csv";
    $handle = fopen($sql, 'r');

    while (!feof($handle)) {
        $user_data[] = fgetcsv($handle, 500, ",");
    }
    //checking the stored data on file
    $sql_id = $user_data[0][0];
    $sql_email = $user_data[0][1];
    $sql_password = $user_data[0][2];

    //replacing the existing password with the updated password

    if ($email == $sql_email) {
        $handle = fopen($sql, 'w');
        $data = array($sql_id, $sql_email, $updatedpassword);
        $csv = ",";

        if (fputcsv($handle, $data, $csv)) {
            return true;
        } else
            return false;
    }
    fclose($handle);
    exit();
}