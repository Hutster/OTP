<?php

$user_phone = $_POST[phone];               //grabs the number using session var
$user_phone = chr(43) . "1" . $user_phone;    //add a +1 in front of the phone to make twilio happy

require "config/db-connect.php";                    //get credentials for mysql pull

$sql="  INSERT INTO user (f_name, phone) 
        VALUES ('$_POST[name]','$user_phone')"; //inserts in user table with first name and phone from landing page

if (!mysqli_query($con,$sql)) {die('Error: ' . mysqli_error($con));}
mysqli_close($con);
?>