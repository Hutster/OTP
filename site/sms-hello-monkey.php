<?php
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";


    $phone = $_REQUEST['From'];
	$message = $_REQUEST['Body'];
?>
<Response>
	<Message>Hello <?php echo $phone; ?>, your message was <?php echo $message; ?></Message>
</Response>

