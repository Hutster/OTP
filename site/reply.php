<?php
if($_POST)
{
    
    $twilioNumber = '+12243741995';         //assign the twilio number that OTP will be sending from
    
    //$userPhone = '+18472261310';            //this is my phone number 


    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	
		//exit script outputting json data
		$output = json_encode(
		array(
			'type'=>'error', 
			'text' => 'Request must come from Ajax'
		));
		
		die($output);
    } 
	
	//check $_POST vars are set, exit if any missing
	if(!isset($_POST["otpReply"]) )
	{
		$output = json_encode(array('type'=>'error', 'text' => 'Input field is empty!'));
		die($output);
	}
    
	//Sanitize input data using PHP filter_var().
	$otp_Reply        = filter_var($_POST["otpReply"], FILTER_SANITIZE_STRING);
    $user_Phone        = filter_var($_POST["userPhone"], FILTER_SANITIZE_STRING);
	
	
    /// SEND INITIAL TEXT MESSAGE, INSERT INTO DATABASE, AND EXIT WITH SUCCESS
    require "twilio/Services/Twilio.php"; //twilio library
    require 'config/twilio-connect.php';    //twilio credentials...not sure if this will work

    
    ////Send confirmation text////
    /////////////////////////////
    $sms = $client->account->messages->sendMessage($twilioNumber, $user_Phone, $otp_Reply);
 

    if (!$sms) {
        $output = json_encode(array('type'=>'error', 'text' => 'Could not send text message!'));
		die($output);
    }
    
    else{
		$output = json_encode(array('type'=>'message', 'text' => "Message sent!"));
		die($output);
	}

}
?>
