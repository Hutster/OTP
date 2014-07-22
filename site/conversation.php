<?php
   
//Thomas: we need the user_id from somewhere
//I think this file is called from sms-monkey once the user replies to twilio

////some of the below can be replaced with: getMessages()////

//if there are no syntax errors then execute
if($result = $con->query("SELECT * FROM messages WHERE userID = ".$user_id." ORDER BY timestamp asc")){
    if($result->num_rows){                          //if the query has a result, then dislpay data
        while($rows = $result->fetch_assoc()){      //loop through result and display mesages
            $userID = $rows['user_id'];
            $content = $rows['content'];
            echo $user_id.': '.$content, '</br></br>';
        }  
    }
}


?>