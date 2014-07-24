<html lang="en">
<head>
    
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Off Track Planet | Exploration Guide</title></title>
	<meta name="description" content="The fastest and easiest way to explore someplace new.">
	<meta name="author" content="S&T">
    <link rel="image_src" href="http://stugl.com/images/otp_logo.svg" />
    <meta property="og:image"content="http://stugl.com/images/otp_logo.svg" />

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS 
  ================================================== --
	<link rel="stylesheet" type="text/css" href="stylesheets/base.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/skeleton.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/layout.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/styles.css">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    
    <style>
        .conversationBox{
            overflow: auto;
            width: 75%;
            height: 60%;
            margin: 1% auto;
            border: solid red 2px;
        }
        
        .success{
            background: #CFFFF5;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #B9ECCE;
            border-radius: 5px;
            font-weight: normal;
        }

        .error{
            background: #FFDFDF;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #FFCACA;
            border-radius: 5px;
            font-weight: normal;
        }
    
    </style>
    
    <!-- MAKE NOTE THAT THE PHP CODE THAT RETRIEVES THAT USER ID AND THEN THE USER PHONE NUMBER MUST BE ABOVE THE SCRIPT!!!!! -->    
    <?php
        $userPhone = '+18472261310';

    ?>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#reply_btn").click(function() { 
            //get input field values
            var otp_reply      = $('input[name=reply]').val();
            var user_phone  = "<?php echo $userPhone; ?>";

            //data to be sent to server
            post_data = {'otpReply':otp_reply, 'userPhone':user_phone};

            //Ajax post data to server
            $.post('reply.php', post_data, function(response){  

                    //load json data from server and output message     
                    if(response.type == 'error')
                    {
                        output = '<div class="error">'+response.text+'</div>';
                    }else{
                        output = '<div class="success">'+response.text+'</div>';

                        //reset values in all input fields
                        $('#contact_form input').val(''); 
                        $('#contact_form textarea').val(''); 
                    }

                    $("#result").hide().html(output).slideDown();
                }, 'json');

        });

        //reset previously set border colors and hide all message on .keyup()
        $("#contact_form input, #contact_form textarea").keyup(function() { 
            $("#contact_form input, #contact_form textarea").css('border-color',''); 
            $("#result").slideUp();
        });

    });
    </script>

    
</head>
<body>
	<div class="container">
        
        <div class="conversationBox">
        
        </div>
        
        <fieldset id="contact_form">
            <div id="result"></div>
            <input class="reply" name="reply" id="reply"/>
            <button class="reply_btn" id="reply_btn">Reply</button>
        </fieldset>
        
        
    </div><!-- container -->
    
    <div class="bottom">A creation by S&amp;T</div>



<!-- End Document
================================================== -->
</body>
</html>