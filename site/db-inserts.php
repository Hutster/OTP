<?php

require "twilio/Services/Twilio.php"; //twilio library
require 'config/db-connect.php';        //databse connect
require 'config/twilio-connect.php';    //twilio credentials...not sure if this will work

////set variables////
////////////////////
$user_phone = $_POST[phone];               //grabs the number using session var
$user_phone = chr(43) . "1" . $user_phone;    //add a +1 in front of the phone to make twilio happy
$twilio_num = '+12243741995';  //twilio phone number

////insert user info in database////
///////////////////////////////////
$sql="  INSERT INTO user (f_name, phone) 
        VALUES ('$_POST[name]','$user_phone')"; //inserts in user table with first name and phone from landing page

////Send confirmation text////
/////////////////////////////
$sms = $client->account->messages->sendMessage(
            $twilio_num, $number, "Hey dude thanks for signing up with OTP! Respond with 'This is dope' to confirm your subsciption.");
 
echo "Sent message to $name "; // Display a confirmation message on the screen

?>