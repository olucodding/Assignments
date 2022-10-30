<?php
if(isset($_POST['Login'])){
// Getting variables from the form
$email = $_POST['Email'];
$password = $_POST['Password'];

if($email !=''&& $password !='')
{
//  To redirect form to thank you page
header("Location:/PHP_PROJECTS/thank_you.html");
}
else{
?><span><?php echo "Please all feilds are required";?></span> <?php
}
}
?>
