<?php
//initializing session
session_start();

if (isset($_POST['submit'])) {

    $username = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (loginUser($username, $password)) {
        header("Location:../dashboard.php");
    } else {
        print "Please check your login details";
        print "Your email and password combination is incorrect";
        print '<meta http-equiv="refresh" content="2; url=../forms/login.html">';
    }

}

function loginUser($email, $password)
{
    /*
     Finish this function to check if username and password 
     from file match that which is passed from the form
     */

    $sql = "../storage/users.csv";
    $handle = fopen($sql, 'r');

    while (!feof($handle)) {
        $userdata[] = fgetcsv($handle, 500, ",");
    }

    $sql_id = $userdata[0][0];
    $sql_email = $userdata[0][1];
    $sql_password = $userdata[0][2];

    if ($email == $sql_email) {
        if ($password == $sql_password) {
            $username = $sql_id;
            $_SESSION['username'] = $username;
            return true;
        } else
            return false;
    } else
        return false;

    fclose($handle);
}
?>