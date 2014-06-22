<?php

require 'dbconnect.php';

//query that runs to return the phone number of the other student
//this number will be used to forward the text on to
$twilio_phone = $_REQUEST['To'];
$student_num = $_REQUEST['From'];
$content = $_REQUEST['Body'];

//$twilio_phone = '+16307967918';
//$student_num = '+13306714458';
//$content = 'Hey Whats Up';

//Checks to see if the number of the student that texted HAS the room or is LOOKING for a room
$typeresult = $con->query("SELECT have_room
                            FROM student 
                            WHERE phone = ".$student_num."");

while($row = $typeresult->fetch_array()){
         $type = $row['have_room']; }

//if they have a room, set the verbs correctly for the SQL
if($type == '1'){
    $word1 = 'want';
    $word2 = 'have';
}

//echo $word1;
//echo $word2;

//if they want a room, set the verbs correctly for the SQL
elseif($type =='0'){
    $word1 ='have';
    $word2 = 'want';
}
//echo $word1;
//echo $word2;

//Qurey to get the phone number of the OTHER person they are trying to reach
$result = $con->query(" SELECT student.phone 
                        FROM student
                        WHERE stu_id =(
                            SELECT distinct student_" .$word1. "
                            FROM conversation
                            INNER JOIN stuconv
                            ON conversation.conv_id = stuconv.conv_id 
                            INNER JOIN student
                            ON stuconv.stu_id = student.stu_id
                            WHERE conversation.student_" .$word2. " = (SELECT stu_id FROM student where phone = " .$student_num. ") 
                            AND twilio_phone = " .$twilio_phone. ")");
    
    while($row = $result->fetch_array()){
         $to_phone = $row['phone']; }
//echo $to_phone;
////
//slect student id of the person sending the text
////
$idresult = $con->query("SELECT stu_id
                            FROM student 
                            WHERE phone = ".$student_num."");

while($row = $idresult->fetch_array()){
         $student_id = $row['stu_id']; }

//echo $student_id;
////
//slect student id of the person sending the text
////
$idresult = $con->query("SELECT stu_id
                            FROM student 
                            WHERE phone = ".$to_phone."");

while($row = $idresult->fetch_array()){
         $student_id2 = $row['stu_id']; }

//echo $student_id2;

////
//gets the conversation id
////
$convresult = $con->query("SELECT conv_id
                            FROM conversation
                            WHERE student_" .$word2. " = " .$student_id."
                            AND student_" .$word1. " = " .$student_id2."");

while($row = $convresult->fetch_array()){
         $conv_id = $row['conv_id']; }

//escapes content
$content = $con->real_escape_string($content);

//Inserts the message into the table
$conversation="INSERT INTO messages (sender_id, receiver_id, conv_id, content)
VALUES ('$student_id','$student_id2','$conv_id','$content')";
mysqli_query($con,$conversation);


//Sends gack to sms-forward.php
?>
