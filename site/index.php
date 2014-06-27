<html lang="en">
<head>
    
    
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Texting Like a Boss</title>
	<meta name="description" content="">
	<meta name="author" content="">
    <link rel="image_src" href="http://hutster.com/images/HutsterLogo_Website.png" />
    <meta property="og:image"content="http://hutster.com/images/HutsterLogo_Website.png" />

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
        <img id="logo" src="/../images/HutsterLogo_Website.png" style="padding: 20px 0px" alt="Hutster Student Sublets"/>
        
		<div class="shading sixteen columns">
            <div class="row">
                <div class="offset-by-two twelve columns alpha">
                    <h1 id="landing">
                        The <strong>fastest and easiest</strong> way to explore a new city, the <strong><i>right way</i></strong>.
                    </h1>
                </div>
            </div>
            
            <div id="mc_embed_signup">
                <form action="insert.php" class="validate" method="post" novalidate>
                    <div class="row">
                    <input id="contact-form" type="text" value="name" name="name" class="textarea <?php echo $firstER ?>" placeholder="first name" tabindex="1">
                        <?php echo "<p class='note'>".$msg_name."</p>";?>
                        <?php echo "<p class='note'>".$msg2_name."</p>";?>
                    </div>
                    
                    <div class="row"> 
                        <input id="contact-form" type="tel" value="phone"  name="phone" class="textarea <?php echo $phoneER ?>" maxlength="15" size="10" placeholder="phone number " tabindex="2">
                        <?php echo "<p class='note'>".$msg_phone."</p>";?>
                        <?php echo "<p class='note'>".$msg2_phone."</p>";?>
                    </div>
                    
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;">
                         <input type="text" name="b" value="">
                    </div>
                    <input type="submit" value="Register" name="register" id="submit" class="button">
                    
                </form>
            </div>
            
        
        <div class="row"></div>
        
	</div><!-- container -->

<!-- End Document
================================================== -->
</body>
</html>
