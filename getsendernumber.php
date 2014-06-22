<?php
require 'dbconnect.php';

$result = $con->query(" SELECT twilio_phone
                        FROM conversation
                        INNER JOIN stuconv
                        ON conversation.conv_id = stuconv.conv_id 
                        INNER JOIN student
                        ON stuconv.stu_id = student.stu_id
                        WHERE student.phone = '3306714458' AND stuconv.active = 1");

while($row = $result->fetch_array()){
    $twilio_phone = $row['twilio_phone'];
}

$twilio_phone = '18472261310';

?>