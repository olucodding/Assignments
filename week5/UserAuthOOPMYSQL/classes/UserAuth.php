
<?php
include_once 'Dbh.php';

class UserAuth extends Dbh {
    private static $db;

    public function __construct(){
        UserAuth::$db = new Dbh();
    }
    
    public function register($fullname, $email, $password, $confirmPassword, $country, $gender){
        $conn = UserAuth::$db->connect();
        if($this->checkEmailExist($email)) {
            Dbh::showError("forms/register.php", "Sorry, it seems this Email already exists");
        } else {
            if($this->confirmPasswordMatch($password, $confirmPassword)){
                $password = md5($password);
                $sql = "INSERT INTO Students (`full_names`, `country`, `email`, `gender, `pwd`) VALUES ('$fullname', '$country', '$email', '$gender', '$password')";
                if($conn->query($sql)){
                    $_SESSION['email'] = $email;
                    Dbh::showError("dashboard.php", "Registration successful");
                } else {
                    Dbh::showError("forms/register.php", "Registration failed");
                }
            } else {
                Dbh::showError("forms/register.php", "Passwords does not match"); 
            }
        }
    }

    public function login($email, $password){
        $conn = UserAuth::$db->connect();
        $sql = "SELECT `pwd` FROM Students WHERE email='{$email}'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $data = $result->fetch_array();
            if($data[0] == md5($password)) {
                $_SESSION['email'] = $email;
                Dbh::showError("dashboard.php", "Login successful");
            } else {
                Dbh::showError("forms/login.php", "Incorrect password");
            }
        } else {
            Dbh::showError("forms/login.php", "Email does not exist");
        }
    }

    public function checkEmailExist($email) {
        $conn = UserAuth::$db->connect();
        $sql = "SELECT id FROM Students WHERE email = '{$email}'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            return true;
        } else {
            return false;
        }
    }

    public function getAllusers(){
        $conn = UserAuth::$db->connect();
        $sql = "SELECT * FROM Students";
        $result = $conn->query($sql);
        echo"<html>
        <head>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
        </head>
        <body>
        <center><h1><u> ZURI PHP students </u> </h1> 
        <table class='table table-bordered' border='0.5' style='width: 80%; background-color: smoke; border-style: none'; >
        <tr style='height: 40px'>
            <thead class='thead-dark'> <th>ID</th><th>Full Names</th> <th>Email</th> <th>Gender</th> <th>Country</th> <th>Action</th>
        </thead></tr>";
        if($result->num_rows > 0){ 
            while($data = mysqli_fetch_assoc($result)){
                //show data
                echo "<tr style='height: 20px'>".
                    "<td style='width: 50px; background: gray'>" . $data['id'] . "</td>
                    <td style='width: 150px'>" . $data['full_names'] .
                    "</td> <td style='width: 150px'>" . $data['email'] .
                    "</td> <td style='width: 150px'>" . $data['gender'] . 
                    "</td> <td style='width: 150px'>" . $data['country'] . 
                    "</td>
                    <td style='width: 150px'> 
                    <form action='action.php' method='post'>
                    <input type='hidden' name='id'" .
                     "value=" . $data['id'] . ">".
                    "<button class='btn btn-danger' type='submit', name='delete'> DELETE </button> </form> </td>".
                    "</tr>";
            }
            echo "</table></table></center></body></html>";
        }
    }

    public function deleteUser(int $id){
        $conn = UserAuth::$db->connect();
        $sql = "DELETE FROM Students WHERE id = '{$id}'";
        if($conn->query($sql) === TRUE){
            Dbh::showError("action.php?all", "User with id: {$id} deleted successfully");
        } else {
            Dbh::showError("action.php?all", "ID ({$id}) does not exist");
        }
    }

    public function updateUser($email, $password){
        $conn = UserAuth::$db->connect();
        if($this->checkEmailExist($email)) {
            $sql = "UPDATE Students SET password = '{$password}' WHERE email = '{$email}'";
            if($conn->query($sql) === TRUE){
                Dbh::showError("forms/login.php", "Password reset successful");
            } else {
                Dbh::showError("forms/resetpassword.php", "Password reset failed");
            }
        } else {
            Dbh::showError("forms/resetpassword.php", "Email does not exist");
        }
    }

    public function logout(){
        session_destroy();
        header('Location: index.php');
    }

    public function confirmPasswordMatch($password, $confirmPassword){
        if($password === $confirmPassword){
            return true;
        } else {
            return false;
        }
    }


}
?>