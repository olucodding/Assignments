<?php

//creating a class Dbh2
class Dbh2
{
    //properties



    // // define variables and set to empty values
    // // $name = $email = $gender = $comment = $website = "";

    // // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // //   $name = test_input($_POST["name"]);
    // //   $email = test_input($_POST["email"]);
    // //   $website = test_input($_POST["website"]);
    // //   $comment = test_input($_POST["comment"]);
    // //   $gender = test_input($_POST["gender"]);
    // // }

    // // function test_input($data) {
    // //   $data = trim($data);
    // //   $data = stripslashes($data);
    // //   $data = htmlspecialchars($data);
    // //   return $data;
    // // }







    //     function set_hostname($hostid)
    //     {
    //         $this->hostname = $hostid;
    //     }

    //     function set_username($userid)
    //     {
    //         $this->username = $userid;
    //     }

    //     function set_password($userpwd)
    //     {
    //         $this->password = $userpwd;
    //     }

    //     function set_dbname($dbid)
    //     {
    //         $this->dbname = $dbid;
    //     }

    //     function getHostname()
    //     {
    //         return $this->hostname;
    //     }

    //     function getUsername()
    //     {
    //         return $this->username;
    //     }

    //     function getPassword()
    //     {
    //         return $this->password;
    //     }

    //     function getDbname()
    //     {
    //         return $this->dbname;
    //     }


    // function set_conn2($connect)
    // {
    //     $this->conn2 = $connect;
    // }

    // function getConn2($connect)
    // {
    //     return $this->conn2 = $connect;
    // }

    // connection to db 
    function connect()
    {

        $hostname = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "zuriPhp";

        // take in form data

        if (isset($_POST['submit'])) {
            $id = "";
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $country = $_POST['country'];
            $gender = $_POST['gender'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirmPassword'];
            $reg_date = "";
        }
        $conn = new mysqli($hostname, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection Failed" . $conn->connect_error);
        }
        $sql = "INSERT INTO Students VALUES ('$id' , '$fullname' , '$email' , '$country' , '$gender' , '$password' , '$confirm_password' , '$reg_date')";

        if ($conn->query($sql) === TRUE) {
            echo "connected to database and your data has been stored";
        } else {
            echo "Error connecting to database" . $sql . "<br>" . $conn->error;
        }
        echo "connection was successful";



        //server connection
        // $conn = mysqli_connect($hostname, $username, $password, $dbname);
        // if (!$conn) {
        //     die("Database connection failed:");
        // } else {
        //     echo "Connected to database successfully";
        // }
    }





    // function set_connect2($conn)
    // {
    //     $this->connect2 = $conn;
    // }

    // function getconnect2()
    // {
    //     return $this->connect2;
    // }


}




//Define a new object
// $users = new dbh();
// $connection = new dbh();

// $users->set_hostname("hostid");
// $users->set_username("userid");
// $users->set_password("userpwd");
// $users->set_dbname("dbid");
// $connection->set_connect2("conn2");


// echo " Your domain name is: " . $users->gethostname() . " \n Your username is: " . $users->getUsername() . " \n Your password is: " . $users->getpassword() . "\n Your database name is: " . $users->getdbname();
// echo "\n Your connection is: " . $connection->getconnect2();
?>