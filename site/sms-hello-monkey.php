<?php
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
 
    $user_phone = $_REQUEST['From'];
	$message = $_REQUEST['Body'];
    
    $response = 'default';
    $success = false;
    $verified = 'boobs and ass';  // This is the reply necessary to gain a successful VERIFICATION
    $verifiedResponse = 'You have been verified! Good thing you like boobs and ass.';  // Reply message for successful verification
        
    $unsubscribe = 'FU';  // This is the reply necessary to gain sucessful UNSUBSCRIBTION
    $unsubscribeResponse = 'Well you are lame.'; //  Reply message for successful unsubscribtion
        
    $rejection = 'Sorry, I didn\'t understand that. Reply with "boobs and ass" to become verified, or "FU" to unsubscribe.'; // Message of rejection
 
	// Check if we've got good data
	if ( (strlen($user_phone) >= 10) && (strlen($message) >= 1) ) {
        
        // Check what type of response we have now
        
        // Check if they are to be verified
        if ( strcasecmp($message, $verified ) == 0 ) {
            $response = $verifiedResponse;
            $success = true;
        }
        
        // Check if they are to be unsubscribed
        elseif ( strcasecmp($message, $unsubscribe) == 0 ) {
            $response = $unsubscribeResponse;
            $success = true;
        }
        
        
        else {
                $response = $rejection;
                $success = false;
        }     
            
	}

	else {
		$response = $rejection;
        $success = false;
	}

    echo '<Response>';
	echo '<Message> Hello ' . $user_phone . '. ' . $response . '</Message>';
    
    
    if ( $success ) {
        require 'auth-sql.php';
    }

	echo '</Response>';
?>