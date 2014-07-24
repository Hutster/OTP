<?php
require 'config/db-connect.php';        //databse connect
$id = $_GET['id']; //GET THE USER ID FROM THE URL SEND FROM USERS.PHP

///////////////////////
///DISPLAY MESSAGES//// <- THIS SHOULD EVENTUALLY GO IN IT'S OWN FIXED BOX
///////////////////////
if($result = $con->query("SELECT * FROM messages WHERE sender = '$id' OR recipient = '$id' ORDER BY timestamp ASC")){
    if($result->num_rows){                          //if the query has a result, then dislpay data
        while($rows = $result->fetch_assoc()){      //loop through result and display mesages
            $userID = $rows['sender'];
            $content = $rows['content'];
            echo $userID.': '.$content, '</br></br>';
        }  
    }
}

/////////////////////////////////////
///INPUT FIELD WITH REPLY BUTTON///// <- ADD THIS BELOW THE FIXED BOX WITH MESSAGES IN IT
/////////////////////////////////////
    
//1. OTP EMPLOYEE TYPES REPLY AND HITS THE SUBMIT BUTTON
//2. THAT MESSAGE IS SENT TO THE USER VIA TWILLIO NUMBER: +1-224-374-1995
//3. THE MESSAGE SHOWS INSERTED INTO DATABASE
//4. THE MESSAGE APPEARS IN THE ABOVE BOX WITHOUT HAVING TO REFRESH
//5. USER REPLIES AND MESSAGE APPEARS IN BOX WITHOUT REFRESHING




?>