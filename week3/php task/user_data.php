<?php
if(isset($_POST['Submit'])){
// Getting variables from the form


$name1 = $_POST['Firstname'];
$name2 = $_POST['Lastname'];
$email = $_POST['Emailaddress'];
$message = $_POST['Message'];
$dob = $_POST['DOB'];
$gender = $_POST['Gender'];
$country = $_POST['Country'];

if($name1 !='' && $name2 !='' && $email !='' && $message !='' && $dob!='' && $gender !='' && $country !='')
{
//  To redirect form to thank you page
//header("Location:/PHP_PROJECTS/thank_you.html");
$filename = "./user_data.csv";
$handle = fopen($filename, "a");
fwrite($handle, $name1);
fwrite($handle, $name2); 
fwrite($handle, $email);
fwrite($handle, $gender);
fwrite($handle, $dob);
fwrite($handle, $country);
fwrite($handle, $message);



fclose($handle);
}
else{
?><span><?php echo "Please all feilds are required";?></span> <?php
}
   
echo "<h2>Thank you for contacting us <br> Your Input is:</h2>";
echo $name1;
echo "<br>";
echo $name2;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
echo "<br>";
echo $dob;
echo "<br>";
echo $country;
echo "<br>";
echo $message;

// $no_rows = count($handle);
      //  if($no_rows > 1)
      //  {
      //      $no_rows = ($no_rows - 1) + 1;
      //  }
       // $form_data = array (
            //'sr_no'     => $no_rows,
         //   'name1'     => $name1,
           /// 'name2'     => $name2,
           /// 'email'     => $email,
           // 'message'   => $message,
           // 'dob'       => $dob,
           // 'gender'    => $gender,
           // 'country'   => $country,
      //  );
        //fputcsv($filename. $form_data);
        //fwrite($handle, $form_data);
}


?>
