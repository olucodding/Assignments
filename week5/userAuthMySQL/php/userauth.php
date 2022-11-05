
<?php

require_once "../config.php";

//register users
function registerUser($fullnames, $email, $password, $gender, $country)
{
    //create a connection variable using the db function in config.php
    $conn = db();

        
    // Escape user inputs for security
    // $fullnames = mysqli_real_escape_string($GLOBALS['conn'], $_POST['fullname']);
    // $email = mysqli_real_escape_string($GLOBALS['conn'], $_POST['email']);
    // $password = mysqli_real_escape_string($GLOBALS['conn'], $_POST['password']);
    // $gender = mysqli_real_escape_string($GLOBALS['conn'], $_POST['gender']);
    // $country = mysqli_real_escape_string($GLOBALS['conn'], $_POST['country']);

    if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM Students2 WHERE email='$email'"))>=1){
        echo "The email . '$email' you endtered is already existing";
        header("refresh:4; url=../forms/register.html");

    }
    else{
    // Attempt insert query execution
    $sql = "INSERT INTO Students2 (`id`, `full_names`, `country`, `email`, `gender`, `pwd`) 
                        VALUES ('', '$fullnames', '$country', '$email', '$gender' , '$password' )";
    if (mysqli_query($conn, $sql)) {
        echo "Records added successfully.";
        header("refresh:1; url=../forms/login.html");
    }
    else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error(conn);
    }

    //check if user with this email already exist in the database
}
}


//login users
function loginUser($email, $password)
{
    //create a connection variable using the db function in config.php
    $conn = db();
    $query = "SELECT * FROM Students2 WHERE email = '$email' AND pwd = '$password'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) >=1){
        session_start();
        $_SESSION['username'] = $email;
        header("Location:../dashboard.php");
    }
    else{
        header("Location:../forms/login.html?message=invalid username");
    }
    

    echo "<h1 style='color: red'> LOG ME IN (IMPLEMENT ME) </h1>";
    //open connection to the database and check if username exist in the database
    //if it does, check if the password is the same with what is given
    //if true then set user session for the user and redirect to the dasbboard
}


function resetPassword($email, $password)
{
    //create a connection variable using the db function in config.php
    $conn = db();
    if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM Students2 WHERE email='$email'"))>=1){
        $sql = "UPDATE table Students2 set password='$password' where email='$email'";
        if(mysqli_query($conn, $sql)){
            echo"<script> aleart('password successfully updated!')</script>";
        }
        else{
            echo"<script> aleart('An Error Occured, please try again')</script>";
        }
    }
    else{
        echo "<h1 style='color: red'>RESET YOUR PASSWORD (IMPLEMENT ME)</h1>";
    }
    
    
    //open connection to the database and check if username exist in the database
    //if it does, replace the password with $password given
}

function getusers()
{
    $conn = db();
    $sql = "SELECT * FROM Students2";
    $result = mysqli_query($conn, $sql);
    echo "<html>
    <head></head>
    <body>
    <center><h1><u> ZURI PHP STUDENTS </u> </h1> 
    <table border='1' style='width: 700px; background-color: magenta; border-style: none'; >
    <tr style='height: 40px'><th>ID</th><th>Full Names</th> <th>Email</th> <th>Gender</th> <th>Country</th> <th>Action</th></tr>";
    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            //show data
            echo "<tr style='height: 30px'>" .
                "<td style='width: 50px; background: blue'>" . $data['id'] . "</td>
                <td style='width: 150px'>" . $data['full_names'] .
                "</td> <td style='width: 150px'>" . $data['email'] .
                "</td> <td style='width: 150px'>" . $data['gender'] .
                "</td> <td style='width: 150px'>" . $data['country'] .
                "</td>
                <form action='action.php' method='post'>
                <input type='hidden' name='id'" .
                "value=" . $data['id'] . ">" .
                "<td style='width: 150px'> <button type='submit', name='delete'> DELETE </button>" .
                "</tr>";
        }
        echo "</table></table></center></body></html>";
    }
    //return users from the database
    //loop through the users and display them on a table
}

function logout(){
    if($SESSION['username'])
    {
        session_unset();
        session_destroy();
        hearder("Location:../index.php?message=logout");
    }
    else{
        hearder("Location:../forms/login.php");
    }

}

function deleteaccount($id)
{
    $conn = db();
    //delete user with the given id from the database
    if(mysqli_num_rows(mysqli_query($conn, "SELECET * FROM Students2 WHERE id=$id"))){
        $sql= "DELETE FROM Students2 WHERE id =$id";
        if(mysqli_query($conn, $sql)){
            echo "<script>alert('DELETED')</script>";
            hearder("refresh:1; url=action.php?all=");
        }
    }
}