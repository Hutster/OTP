<?php
require 'config/db-connect.php';        //databse connect

//get the current phone number and put it in the variable user_phone
$user_phone = '+18472261310';

//now query to get the user id from user table using the phone number
$result = $con->query("SELECT * FROM user WHERE user_phone = $user_phone ");

//put result in an array then select the row and assign variable
while($row = $result->fetch_array()){ $user_id = $row['user_id']; }

//check to see if user is already authenicated, incase they replay twice
$check = $con->query("SELECT user_id FROM authenticate WHERE user_id = $user_id ");
if (!mysqli_query($con,$check)) {die('Error: ' . mysqli_error($con));}
    mysqli_close($con);

//if query fails (aka user not auth yet) then insert new auth row for user
if($query == false) {
    //mark user as authenticaed by inserting into auth table
    $sql="INSERT INTO `authenticate`(`user_id`, `auth_bool`) VALUES ($user_id,true)"; 

    //run query and check for error
    if (!mysqli_query($con,$sql)) {die('Error: ' . mysqli_error($con));}
    mysqli_close($con);
}

?>