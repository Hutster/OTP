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
  ================================================== -->
	<link rel="stylesheet" type="text/css" href="stylesheets/base.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/skeleton.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/layout.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/styles.css">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->
    
	<div class="container">
        <img id="logo" src="/images/otp_logo.svg" style="padding: 20px 0px" alt="Off Track Planet"/>
        
		<div class="shading sixteen columns">
            <div class="row">
                <div class="offset-by-two twelve columns alpha">
                    <h1 id="landing">
                        The <strong>fastest and easiest</strong> way to explore someplace new.
                    </h1>
                </div>
            </div>
            
            <div id="signup">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="validate" method="post" novalidate>
                    
                    <div class="row">
                        <h4>What's your mom call you?</h4>
                    <input id="contact-form" type="text" value="<?php echo $_POST['first']; ?>" name="first" class="textarea <?php echo $firstER ?>" tabindex="3">
                        <?php echo "<p class='note'>".$msg_name."</p>";?>
                        <?php echo "<p class='note'>".$msg2_name."</p>";?>
                    </div>
                    
                    
                    <div class="row"> 
                        <h4>What are your digits?</h4>
                        <input id="contact-form" type="tel" value="<?php echo $phone; ?>"  name="phone" class="textarea <?php echo $phoneER ?>" maxlength="15" size="10" tabindex="5">
                        <?php echo "<p class='note'>".$msg_phone."</p>";?>
                        <?php echo "<p class='note'>".$msg2_phone."</p>";?>
                    </div>
                    
                    
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;">
                         <input type="text" name="good_one" value="">
                    </div>
                    
                    <div class="row">
                        <input type="submit" value="Sign up!" name="register" id="submit" class="button">
                    </div>
                    
                </form>
            </div>
            
        
                        
	    </div>
        
        
        
    </div><!-- container -->
    
    <div class="bottom">A creation by S&amp;T</div>



<!-- End Document
================================================== -->
</body>
</html>