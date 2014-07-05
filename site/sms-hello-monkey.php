<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
 
    $phone = $_REQUEST['From'];
	$message = $_REQUEST['Body']
    
    $success = false;
    $verified = 'boobs and ass';  // This is the reply necessary to gain a successful VERIFICATION
    $verifiedResponse = 'You have been verified! Good thing you like boobs and ass.'  // Reply message for successful verification
        
    $unsubscribe = 'stop';  // This is the reply necessary to gain sucessful UNSUBSCRIBTION
    $unsubscribeResponse = 'Well you are lame.' //  Reply message for successful unsubscribtion
        
    $rejection = 'Sorry, I didn\'t understand that. Reply with "boobs and ass" to become verified, or "stop" to unsubscribe.'; // Message of rejection
 
	// Check if we've got good data
	if ( (strlen($phone) >= 10) && (strlen($message) > 0) ) {
        
        //Check what type of response we have
        if ( $message == $verified ) {
            $response = $verifiedResponse;
            $success = true;
        }
        
        else if ( $message == $unsubscribe ) {
            $response = $unsubscribeResponse;
            $success = true;
        }
        
        else {
            $success = false;
        }     
            
	}

	else {
		$response = $rejection;
        $success = false;
	}
 
    echo '<Response>';
	echo '<Message> Hello ' . $phone . ' . ' . $response . '</Message>';
    
    /*
    if ( $success ) {
    
    <Redirect> 
        ../nextInstructions 
    </Redirect> 
    }
    
    */

	echo '</Response>';
?>