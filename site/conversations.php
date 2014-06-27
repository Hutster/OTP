<?php
require 'dbconnect.php';

$conv_id ='53';


if($result = $con->query(" SELECT * FROM messages WHERE conv_id = ".$conv_id." ORDER BY mes_id asc")){
    if($result->num_rows){
        
        while($rows = $result->fetch_assoc()){
            
            $sender_id = $rows['sender_id'];
            $content = $rows['content'];
            
            echo $sender_id.': '.$content, '</br></br>';
        
        }
       
        
    }
}


?>

