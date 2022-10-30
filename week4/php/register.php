<?php
if(isset($_POST['submit'])){
    //Trim unwanted character from the input form
    $username = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if(registerUser($username, $email, $password)){
        print "You have been successfully registered";
        print "kindly login to your account!";
        print '<meta http-equiv="refresh" content="2; url=../forms/login.html">';
    } else {
        print "User not registered!"; 
        print '<meta http-equiv="refresh" content="2; url=../forms/register.html">';
    }
}

function registerUser($username, $email, $password){
    //saving data into csv file
 
    $filename = "../storage/users.csv";
    $handle = fopen($filename, 'w');
    $user_data = array($username, $email, $password);
    $csv = ",";
    
    if(fputcsv($handle, $user_data, $csv)){
        return true;
     } else return false;

    fclose($handle);
}