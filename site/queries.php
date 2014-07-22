<?php

//get all authenticated users
//@output -> user_id user_fname user_phone auth timestamp
$query = "SELECT * FROM user WHERE auth='1'";

/////getMessages()/////
//get messages for specified user
//@params -> $user_id
//@output -> messID, userID, content, timestamp
$query = "SELECT * FROM messages WHERE userID = ".$user_id." ORDER BY timestamp asc";





////recordMessage()////                 <-THOMAS: PUT THE FOLLOWING CODE WHERE YOU WANT TO INSERT A MESSAGE
//insert messages from a user
//@params -> $user_id, $messageContent
//@output -> null
require 'config/db-connect.php';        //databse connect
$query = "INSERT INTO `messages`(`userID`, `content`) VALUES ($user_id,$messageContent)";
mysqli_query($con,$query);






//insert user info
//@params -> $user_fname, $user_phone
//@output -> none
$query = "INSERT INTO user (user_fname, user_phone) VALUES ('$user_fname','$user_phone')";

//get user id from phone number
//@params -> $user_phone
//@output -> user_id
$query = "SELECT user_id FROM user WHERE user_phone = $user_phone ";

//check if user is authenticated
//@params -> $user_id
//@output -> boolean
$query = "SELECT auth FROM user WHERE user_id = '$user_id' ";

//update user as authenticated
//@params -> $user_id
//@output -> null
$query = "UPDATE user SET auth = 'true' WHERE user_id = $user_id";


?>