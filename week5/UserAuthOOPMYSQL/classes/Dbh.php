<?php
//session_start();
class Dbh {
    private string $hostname = "localhost";
    private string $username = "root";
    private string $password = "";
    private string $database = "zuriphp";

    protected function connect() {
        $conn1 = new mysqli($this->hostname, $this->username, $this->password, $this->database);
        if($conn1->connect_error) {
            Dbh::showError("../index.php", "Error connecting to database");
        }
        return $conn1;
    }

    public static function showError($url, $message = "Sorry, we just ran into a glitch, \n please try again") {
        echo $message . " Click <a href=\"$url\"><strong>here</strong></a> if you are not redirected automatically";
        header("refresh:1; url=$url");
    }
}
?>
