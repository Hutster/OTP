<?php

$user_phone = $_SESSION[phone];               //grabs the number using session var
$user_phone = chr(43) . "1" . $phonetwil;    //add a +1 in front of the phone to make twilio happy

require "config/dbconnect.php";                    //get credentials for mysql pull

$sql="  INSERT INTO user (f_name, phone) 
        VALUES ('$_SESSION[name]','$user_phone')"; //inserts in user table with first name and phone from landing page

if (!mysqli_query($con,$sql)) {die('Error: ' . mysqli_error($con));}
mysqli_close($con);
?>