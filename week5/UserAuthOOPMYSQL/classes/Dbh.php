<?php

//creating a class
class Dbh
{
    //properties
    public $hostname;
    public $username;
    public $password;
    public $dbname;
    public $connection;
    public $connect2;

    function set_hostname($hostid)
    {
        $this->hostname = $hostid;
    }

    function set_username($userid)
    {
        $this->username = $userid;
    }

    function set_password($userpwd)
    {
        $this->password = $userpwd;
    }

    function set_dbname($dbid)
    {
        $this->dbname = $dbid;
    }

    function getHostname()
    {
        return $this->hostname;
    }

    function getUsername()
    {
        return $this->username;
    }

    function getPassword()
    {
        return $this->password;
    }

    function getDbname()
    {
        return $this->dbname;
    }


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
        $host = "127.0.0.1";
        $username = "root";
        $password = "";
        $db = "zuriPhp";


        //server connection
        $conn = mysqli_connect($host, $username, $password, $db);
        if (!$conn) {
            die("Database connection failed:");
        } else {
            echo "Connected to database successfully";
        }

        return $conn;
    }

    function set_connect2($conn)
    {
        $this->connect2 = $conn;
    }

    function getconnect2()
    {
        return $this->connect2;
    }


}

// function CloseCon($conn)
// {
//     $conn->close();
// }

// define a connection function



// function set_connection($connect)
// {
//     $this->connection = $connect;
// }

// function getconnection()
// {
//     return $this->connection;
// }


//Define a new object
$users = new dbh();
$connection = new dbh();

$users->set_hostname("hostid");
$users->set_username("userid");
$users->set_password("userpwd");
$users->set_dbname("dbid");
$connection->set_connect2("connect2");


echo " Your domain name is: " . $users->gethostname() . " \n Your username is: " . $users->getUsername() . " \n Your password is: " . $users->getpassword() . "\n Your database name is: " . $users->getdbname();
echo "\n Your connection is: " . $connection->getconnect2();
?>