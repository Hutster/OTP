<?php
    // Get the PHP helper library from twilio.com/docs/php/install
    require_once('twilio/Services/Twilio.php'); // Loads the library
 
    $AccountSid = "ACb96a18da857931b850c16568a0275715";
    $AuthToken = "a4f4afdaa4f80f87e50d816b2ce7db9f";
    $client = new Services_Twilio($AccountSid, $AuthToken);
 
    $sms = $client->account->sms_messages->create("+14158141829", "+14159352345", "Jenny please?! I love you <3", array());
    echo $sms->sid;


    <FORM action="SendSMS.php" method="post" style="width: 250px; padding-left: 10px"> 
            <p>Message: <br>
            <TextArea type="text" name="message" style="width: 100%"></TextArea><br><br> 
            <BUTTON name="reset" type="reset">Reset</BUTTON> 
            <BUTTON name="submit" value="submit" type="submit">Send</BUTTON> 
        </P> 
    </FORM>

?>