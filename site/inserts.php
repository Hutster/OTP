<?php

$phonetwil = $_SESSION[phone];               //grabs the number using TWILIO api
$phonetwil = chr(43) . "1" . $phonetwil;    //add a +1 in front of the phone to make twilio happy

require "dbconnect.php";                    //get credentials for mysql pull

$sql="  INSERT INTO user (f_name, phone) 
        VALUES ('$_SESSION[first]','$phonetwil')"; //inserts in user table with first name and phone from landing page

if (!mysqli_query($con,$sql)) {die('Error: ' . mysqli_error($con));}
mysqli_close($con);
?>