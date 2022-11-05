<?php
session_start();

class Dbh3
{
    private string $_hostname = "localhost";
    private string $_username = "root";
    private string $_password = "";
    private string $_database = "zuriphp";

    protected function connect()
    {
        $conn3 = new mysqli($this->_hostname, $this->_username, $this->_password, $this->_database);
        if ($conn3->connect_error) {
            Dbh3::showError("index.php", "Error generated while connecting to database");
        }
        return $conn3;
    }

    public static function showError($url)
    {
        echo  " You are being redirected to your page", "\n But if you are not redirected automatically, kindly click <a href=\"$url\"><strong>here</strong></a>";
        header("refresh:1; url=$url");
    }
}
?>