<?php
    require "twilio/Services/Twilio.php";
 
    $AccountSid = "AC0a5283b5a6cd46da622e68d2d87a0381";
    $AuthToken = "664a35fb7a569d36924a06c86bfb46d3";
 
    //instantiate a new Twilio Rest Client
    $client = new Services_Twilio($AccountSid, $AuthToken);
 
   //make an array of people we know, to send them a message. 
    require "studentlist.php";
   
 
foreach($people as $peoples){
    foreach ($peoples as $number => $name) {
 
        $sms = $client->account->messages->sendMessage(
 
        // Step 6: Change the 'From' number below to be a valid Twilio number 
        // that you've purchased, or the (deprecated) Sandbox number
            "234-200-1969", 
 
            // the number we are sending to - Any phone number
            $number,
 
            // the sms body
            "Hey $name, this is your private line with that cool guy sitting over there! Reply to talk about subleasing!"
        );
 
        // Display a confirmation message on the screen
        echo "Sent message to $name";
        
    }
}
?>