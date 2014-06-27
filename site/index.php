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
    
    <script type="text/javascript">
        function validate()
        {
            
           if( document.main.name.value == "" || document.main.name.length < 2)
           {
             alert( "Please provide your name!" );
             document.main.name.focus() ;
             return false;
           }
           if( document.main.phone.value == "" )
           {
             alert( "Please provide your phone number!" );
             document.main.phone.focus() ;
             return false;
           }
            
           var newPhone = document.main.phone.value
           newPhone = newPhone.replace(/[^0-9]/g, '');
            
           if( newPhone.length != 10 )
           {
             alert( "Please provide a 10 digit phone number!" );
             document.main.phone.focus() ;
             return false;
           } 
            
           return( true );
        }
        //-->
    </script>
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
                <form name="main" action="db-inserts.php" class="validate" method="post" onsubmit="return(validate());" novalidate>
                    <div class="row">
                    <input id="contact-form" type="text" name="name" class="textarea" placeholder="first name" tabindex="1">
                    </div>
                    
                    <div class="row"> 
                        <input id="contact-form" type="tel" name="phone" class="textarea" maxlength="15" size="10" placeholder="phone number " tabindex="2">
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
