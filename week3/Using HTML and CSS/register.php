
    <?php
    
    //$error = "";
   // $name1 ="";
   // $name2 ="";
   // $email = "";
   // $message = "";

   // $dob = "";
    //$gender = "";
    //$country = "";


    $error = "";
   $name1 = $_POST['FirstName'];
   $name2 = $_POST['LastName'];
   $phone = $_POST['PhoneNumber'];
   $email = $_POST['EmailAddress'];
   $gender = $_POST['Gender'];
   $dob = $_POST['Birthday'];
   $colour = $_POST['FavouriteColour'];
   $message = $_POST['Message'];

    //echo "First Name:"  . $name1 . "<br>";
    //echo "Last Name:" . $name2 . "<br>";
    //echo "Email:" . $email . "<br>";
    //echo "Message:" . $message . "<br>";
    //echo "D.O.B:" . $dob  . "<br>";
    //echo "Gender:" . $gender . "<br>";
    //echo "Country:" . $country . "<br>";



    function clean_text($string)
    {
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
        return $string;
    }

if(isset($_POST["Submit"]))
{
    if(empty($_POST["name1"]))
    {
        $error .='<p><label class="text-danger">Please Enter Your Name</label></p>';
    }
        else
         {
        $name = clean_text($_POST["name1"]);
        if(!preg_match("/^[a-zA-Z]*$/",$name1))
            {
            $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
            }
    }

    if(empty($_POST["name2"]))
    {
        $error .='<p><label class="text-danger">Please Enter Your Name</label></p>';
    }
        else
         {
        $name = clean_text($_POST["name2"]);
        if(!preg_match("/^[a-zA-Z]*$/",$name2))
            {
            $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
            }
    }

        if(empty($_POST["phone"]))
    {
        $error .='<p><label class="text-danger">Please Enter Your Phone Number</label></p>';
    }
        else
         {
        $name = clean_text($_POST["phone"]);
        if(!preg_match("/^[a-zA-Z]*$/ 0-9",$phone))
            {
            $error .= '<p><label class="text-danger">Only numbers 0 to 9 allowed</label></p>';
            }
    }

    if(empty($_POST["email"]))
    {
        $error .='<p><label class="text-danger">Please Enter Your Email</label></p>';
    }
    else 
    {
        $email = clean_text($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $error .= '<p><label class="text-danger">Invalid Email Format</label></p>';
        }
    }

    if(empty($_POST["subject"]))
    {
        $error .='<p><label class="text-danger">Subject is Required</label></p>';
    }
    else
    {
        $subject = clean_text($_POST["subject"]);
    }

     if(empty($_POST["gender"]))
    {
        $error .='<p><label class="text-danger">Gender is Required</label></p>';
    }
    else
    {
        $gender = clean_text($_POST["gender"]);
    }

     if(empty($_POST["dob"]))
    {
        $error .='<p><label class="text-danger">D.O.B is Required</label></p>';
    }
    else
    {
        $dob = clean_text($_POST["dob"]);
    }

     if(empty($_POST["colour"]))
    {
        $error .='<p><label class="text-danger">Your Favourite Colour is Required</label></p>';
    }
    else
    {
        $colour = clean_text($_POST["colour"]);
    }

     if(empty($_POST["message"]))
    {
        $error .='<p><label class="text-danger">Please enter your message to us</label></p>';
    }
    else
    {
        $message = clean_text($_POST["message"]);
    }

   // if($error == "")
   // {
   //     $form_data = array (
     //       'name1'     => $name1,
     //       'name2'     => $name2,
     //       'phone'     => $phone,
     //       'email'     => $email,
     //       'gender'     => $gender,
      //      'D.O.B'     => $dob,
      //      'colour'   => $colour,
     //       'message'   => $message,
    //    );
        
    //  print_r($form_data);


    }
    
echo "<h2>Thank you for contacting us <br> Your Input is:</h2>";
echo $name1;
echo "<br>";
echo $name2;
echo "<br>";
echo $phone;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
echo "<br>";
echo $dob;
echo "<br>";
echo $colour;
echo "<br>";
echo $message;
    
   ?>