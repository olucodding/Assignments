<?php

session_start();

function logout(){
    /*
        Check if the existing user has a session
        if it does
        destroy the session and redirect to login page
    */
    if(isset($_SESSION['username'])) {
        unset($_SESSION['username']);
        session_destroy();
        header("Location:../forms/login.html");
    } else {
        print "You are not logged in yet";
        print "kindly login to your account";

        header("Location:../forms/login.html");
        
    }
}
logout();