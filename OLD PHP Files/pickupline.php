<?php
require "twilio/Services/Twilio.php";
require 'dbconnect.php';
$AccountSid = "ACb96a18da857931b850c16568a0275715";
$AuthToken = "a4f4afdaa4f80f87e50d816b2ce7db9f";

$client = new Services_Twilio($AccountSid, $AuthToken);

//Build simple from here with fields for:
//Student_Have - fName, email, phone, have_room, city
//Student_Want - fName, email, phone, have_room, city
//Twilio Number to use...can be a list of options
//Press Enter
//...
//...
//Both students are put into an array with format of:
    //'+13306714458' => 'Sean'
    //'+18472261310' => 'Thomas'
//...
//...
//Both students are checked for in the student table...if they don't exist, add them. If they do, select for ID numbers
    /*students can be added from the hutster landing page too...that is why a check is necesary*/
//Select for the student ID numbers - student_have and student_want
//insert into conversation table:
    //*student_have_id
    //*student_want_id
    //*Twilio_number
    //select for the conversation id just entered
//insert into stuconv table:
    //*student_have_id + conversation_id
    //*student_want_id + conversation_id
    //*set both to active...'1'

///AT THIS POINT THE DATABASE IS UP TO DATE///


////////////////////////////////////////////////
/////////////Enter in Information///////////////
////////////////////////////////////////////////

$have_number = '+12039152592'; 
$want_number = '+17024687401';
$have_name = 'Kedar';
$want_name = 'Andrew';

////////////something to code in/////////////
//we can have an sql check to see if either of these people have a conversation going on
//if want_number has a conversatoin already happening....return the twilio number
//then return an available twillio numbers
//set the variable to the available twillio number
/////////////////////////////////////////////
$twilio_num = '+12243741995'; 

//
//

//+16307967918
//+12243741995
////////////////////////////////////////////////
////////////////////////////////////////////////
////////////////////////////////////////////////


////
//Gets the student ID of the student that has a room
////
$result = $con->query(" SELECT student.stu_id 
                        FROM student
                        WHERE phone = " .$have_number. "");

 while($row = $result->fetch_array()){
         $stu_have_id = $row['stu_id']; }

////
//Gets the student ID of the student that wants a room
////
$result = $con->query(" SELECT student.stu_id 
                        FROM student
                        WHERE phone = " .$want_number. "");

while($row = $result->fetch_array()){
         $stu_want_id = $row['stu_id']; }


////
//Inserts into the conversation table
////
$conversation="INSERT INTO conversation (student_have, student_want, twilio_phone)
VALUES ('$stu_have_id','$stu_want_id','$twilio_num')";
mysqli_query($con,$conversation);


////
//Gets the conversatoin id
////
$result = $con->query(" SELECT conv_id
                        FROM conversation
                        WHERE student_have = " .$stu_have_id. " AND student_want = " .$stu_want_id. "");

while($row = $result->fetch_array()){
         $conv_id = $row['conv_id']; }

echo $conv_id;

////
//Inserts into the stuconv table
////
$stuconv="INSERT INTO stuconv (stu_id, conv_id, active)
VALUES ('$stu_have_id','$conv_id','1')";
mysqli_query($con,$stuconv);

$stuconv="INSERT INTO stuconv (stu_id, conv_id, active)
VALUES ('$stu_want_id','$conv_id','1')";
mysqli_query($con,$stuconv);

mysqli_close($con);


$people = array(
        $have_number => $have_name,
        $want_number => $want_name
  );


    foreach ($people as $number => $name) {
 
        $sms = $client->account->messages->sendMessage(
 
        // Step 6: Change the 'From' number below to be a valid Twilio number 
        // that you've purchased, or the (deprecated) Sandbox number
            $twilio_num, 
 
            // the number we are sending to - Any phone number
            $number,
 
            //If the student is the one who HAS the room send this message:
            
            
            // the sms body
            "Hey $have_name and $want_name! Hutster has found a sublet match for you! This is your private and anonymous texting/calling line with each other. Just reply to this text and your conversation can get underway."
        );
 
        // Display a confirmation message on the screen
        echo "Sent message to $name ";
        
    }


?>

