<?php

    require 'config/db-connect.php';        //databse connect
    $query = "SELECT * FROM user WHERE auth='1'";

    if($result = $con->query("SELECT * FROM user WHERE auth='1'")){
        if($result->num_rows){                          //if the query has a result, then dislpay data
            while($rows = $result->fetch_assoc()){      //loop through result and display mesages
                $userID = $rows['user_id'];
                $userName = $rows['user_fname'];
                echo $userID. ': <a href="http://stugl.com/conversation11.php?id=' . $userID . '"> '. $userName . '</a></br>';

        }  
    }
}

?>