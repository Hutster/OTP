<?php
require 'config/db-connect.php';        //databse connect


$id = $_GET['id'];
    
////some of the below can be replaced with: getMessages()////

//if there are no syntax errors then execute
if($result = $con->query("SELECT * FROM messages WHERE sender = '$id' OR recipient = '$id' ORDER BY timestamp ASC")){
    if($result->num_rows){                          //if the query has a result, then dislpay data
        while($rows = $result->fetch_assoc()){      //loop through result and display mesages
            $userID = $rows['sender'];
            $content = $rows['content'];
            echo $userID.': '.$content, '</br></br>';
        }  
    }
}


?>