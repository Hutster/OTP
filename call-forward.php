<?php
header('Content-Type: text/html');
require 'dbconnect.php';
require 'sms-forward-databasePull.php';
?>


<Response>
    <Dial callerId="<?php echo $twilio_phone ?>">
        <Number>
            <?=$to_phone?>
        </Number>
    </Dial>
</Response>

 
