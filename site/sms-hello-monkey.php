<?php
	echo '<?xml version="1.0" encoding="UTF-8" ?>';
    require 'config/db-connect.php';        //databse connect

    $user_phone = $_REQUEST['From'];
	$message = $_REQUEST['Body'];
    $twilioPhone = $_REQUEST['To'];

    $result = $con->query("SELECT user_id FROM user WHERE user_phone = $user_phone "); //get user id from phone
    while ($row = $result->fetch_assoc()) {$user_id = $row['user_id'];}
    //echo $user_id;

    $result = $con->query("SELECT auth FROM user WHERE user_id = $user_id "); //check if authenticated
    while ($row = $result->fetch_assoc()) {$check = $row['auth'];}
    //echo $check;

    //USER IS AUTHETICATED
    if ($check == 1){
        //echo "you're in the loop";
        $query = "INSERT INTO messages(content, sender) VALUES ($message','$user_id')";
        //ADD IN SOMETHING TO SEE WHO THE ACTIVE OTP USER IS AND PUT THEM AS THE RECIPIENT
        mysqli_query($con,$query);
        echo '<Response>';
        echo '</Response>';
        
    }

    if ($check == 0){
        
        $response = 'default';
        $success = false;
        $verified = 'boobs and ass';  // This is the reply necessary to gain a successful VERIFICATION
        $verifiedResponse = 'You have been verified! Good thing you like boobs and ass.';  // Reply message for successful verification

        $unsubscribe = 'FU';  // This is the reply necessary to gain sucessful UNSUBSCRIBTION
        $unsubscribeResponse = 'Well you are lame.'; //  Reply message for successful unsubscribtion

        $rejection = 'Sorry, I didn\'t understand that. Reply with "boobs and ass" to become verified, or "FU" to unsubscribe.'; // Message of rejection

        $repeatResponse = 'Looks like you are already subscribed!';

        // Check if we've got good data
        if ( (strlen($user_phone) >= 10) && (strlen($message) >= 1) ) {

            // Check what type of response we have now

            // Check if they are to be verified
            if ( strcasecmp($message, $verified ) == 0 ) {
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

        //get the user name from our database
        $result = $con->query("SELECT * FROM user WHERE user_phone = $user_phone ");
        while($row = $result->fetch_array()){ $user_name = $row['user_fname']; }

        echo '<Response>'; //Begin the response
        echo '<Message> Hello ' . $user_name;

        if ( $success ) {
             $query = "UPDATE user SET auth = '1' WHERE user_id = '$user_id'"; 
             mysqli_query($con,$query);
             $response = $verifiedResponse;
            // Authenticate the insert
        }

        echo $response . '</Message>';
        echo '</Response>';
        
    }

    
?>