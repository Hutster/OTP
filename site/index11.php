<?php
    session_start();
    $homepage = "/";
    $currentpage = $_SERVER['REQUEST_URI'];

    if( substr($currentpage, 0, 5) == "/?utm") {
            header('Location: http://hutster.com/');
                exit(); 
    }

    $first = $phone = $email = $city = "";
    $firstER = $phoneER = $emailER = $roomER = $cityER = "";
    $value = 0;

if (isset($_POST['register'])) {
    
    //checking name
    if(empty($_POST['first'])){
        $msg_name = "In order to get to the next step, we need your name!";
        $firstER = "papilated";
    }
    
    else {
        $name_subject = $_POST['first'];
        $name_pattern = '/^[a-zA-Z ]*$/';
        preg_match($name_pattern, $name_subject, $name_matches);
            if(!$name_matches[0]) {
                $msg2_name = "Let's make life simpler and not use crazy symbols :)";
                $firstER = "papilated";
            }
            
            elseif($name_matches[0]) {
                $firstER = "validated"; 
                $_SESSION['first'] = $_POST['first'];
            }
    }
    
    //checking city
    if(empty($_POST['city'])){
        $msg_city = "Tell us the city you'd like to sublet in!";
        $cityER = "papilated";
    }
    
    else {
        $city_subject = $_POST['city'];
        $city_pattern = '/^[a-zA-Z ]*$/';
        preg_match($city_pattern, $city_subject, $city_matches);
            if(!$city_matches[0]) {
                $msg2_city = "Let's make life simpler and not use crazy symbols :)";
                $cityER = "papilated";
            }
            
            elseif($city_matches[0]) {
                $cityER = "validated";
                $_SESSION['city'] = $_POST['city'];
            }
    }
    
    
    //check phone
    if(empty($_POST['phone'])){
        $msg_phone = "In order to get to the next step, we need your phone!";
        $phoneER = "papilated";
    }
    
    else {
        $phone = preg_replace('/[^0-9]/', '', $_POST['phone']);
            if(strlen($phone) > 10) {
                $phoneER = "papilated";
                $msg2_phone = "Hmm, try entering your phone number in like '0123456789'";
            }
                
            elseif(strlen($phone) < 10){
                $msg2_phone = "Hmm, we need more digits! Try something like '0123456789'";
                }

            else{
                $phoneER = "validated";
                $_SESSION['phone'] = $phone;
            }
    }
    

    
    //check email
    if(empty($_POST['email'])){
        $msg_email = "In order to get to the next step, we need your email!";
        $emailER = "papilated";
    }
    
    else {
        $email_subject = $_POST['email'];
        $email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
        preg_match($email_pattern, $email_subject, $email_matches);
            if(!$email_matches[0]){
                $msg2_email = "Make sure to put in a valid .edu email address";
                $emailER = "papilated";
            }
            
            elseif (strpos($_POST['email'], '.edu') == FALSE){
                $msg3_email = "Remember to use your .edu email address!";
                $emailER = "papilated";  
            }
            
            else{
                $emailER = "validated";
                $_SESSION['email'] = $_POST['email'];
            }
    }
    
    if(!isset($_POST['have_room'])){
        $msg_room = "Help us out with what you're looking for!";
    }
    
    if(isset($_POST['have_room'])){
        $roomER = "validated";
        $_SESSION['have_room'] = $_POST['have_room'];
    }    

    
    
    if($firstER == "validated" && $phoneER == "validated" && $emailER == "validated" && $roomER == "validated" && $cityER == "validated"){        
        $to = "thomas@hutster.com, sean@hutster.com";
        $from = $_SESSION[first]; // sender
        $subject = $from . " just signed up!";
        $phonetwil = $_SESSION[phone];
        $phonetwil = chr(43) . "1" . $phonetwil;
        $message = "Wake up! " . $from . " just signed up, so you should call them. \n\n Phone number: " . $phonetwil . "\n\n Email: " . $_SESSION[email] . "\n\n Have_room: " . $_SESSION[have_room] . "\n\n City: " . $_SESSION[city];
        // message lines should not exceed 70 characters (PHP rule), so wrap it
        $message = wordwrap($message, 70);
        // send mail
        mail($to, $subject, $message);
        
        //we need this to not show up in the url
        header('Location: http://hutster.com/insert.php');
            exit();
        }
    }

?>
<html lang="en">
<head>
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-34180148-1']);
      _gaq.push(['_trackPageview']);


      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
    
    
	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Student Sublet Concierge Service | Students You Can Trust </title></title>
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
                        The <strong>fastest and easiest</strong> way to sublease with students you can trust.
                    </h1>
                </div>
            </div>
            
            <div id="mc_embed_signup">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="validate" method="post" novalidate>
                   
                    <div id="radios">
                        <h2>I am... </h2>
                        <ul>
                            <li class="radios">
                                <input type="radio" value="0" name="have_room" id="mce-group[14353]-14353-0" tabindex="1" autofocus <?php if ($_POST['have_room'] == '0') echo 'checked'; ?> >
                                <label for="mce-group[14353]-14353-0">Looking for a room!</label>
                            </li>
                            <li class="radios">
                                <input type="radio" value="1" name="have_room" id="mce-group[14353]-14353-1" tabindex="2" <?php if ($_POST['have_room'] == '1') echo 'checked'; ?> >
                                <label for="mce-group[14353]-14353-1">Subleasing my room!</label>
                            </li>
                        </ul> 
                        <?php echo "<p class='noteradio'>".$msg_room."</p>";?>
                    </div>
                    
                    <div class="row">
                    <input id="contact-form" type="text" value="<?php echo $_POST['first']; ?>" name="first" class="textarea <?php echo $firstER ?>" placeholder="first name" tabindex="3">
                        <?php echo "<p class='note'>".$msg_name."</p>";?>
                        <?php echo "<p class='note'>".$msg2_name."</p>";?>
                    </div>
                    
                    <div class="row">
                    <input id="contact-form" type="text" value="<?php echo $_POST['city']; ?>" name="city" class="textarea <?php echo $cityER ?>" placeholder="city of sublet" tabindex="4">
                        <?php echo "<p class='note'>".$msg_city."</p>";?>
                        <?php echo "<p class='note'>".$msg2_city."</p>";?>
                    </div>
                    
                    <div class="row"> 
                        <input id="contact-form" type="tel" value="<?php echo $phone; ?>"  name="phone" class="textarea <?php echo $phoneER ?>" maxlength="15" size="10" placeholder="phone number " tabindex="5">
                        <?php echo "<p class='note'>".$msg_phone."</p>";?>
                        <?php echo "<p class='note'>".$msg2_phone."</p>";?>
                    </div>
                    
                    <div class="row"> 
                    <input id="contact-form" type="email" value="<?php echo $_POST['email']; ?>" name="email" class="textarea <?php echo $emailER ?>" placeholder="your .edu email address" tabindex="6" >
                        <?php echo "<p class='note'>".$msg_email."</p>";?>
                        <?php echo "<p class='note'>".$msg2_email."</p>";?>
                        <?php echo "<p class='note'>".$msg3_email."</p>";?>
                    </div>
                    
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;">
                         <input type="text" name="b_23826e339dacfe8857c196f78_ca2261630d" value="">
                    </div>
                    <?php echo $values; ?>
                    <input type="submit" value="Register" name="register" id="submit" class="button">
                    
                </form>
            </div>
            
            <div class="row process">
                <div class="offset-by-two four columns alpha">
                    <img src="/images/one.png" class="steps">
                    <h2>Register now</h2>
                </div>
                <div class="four columns">
                    <img src="/images/two.png" class="steps">
                    <h2>We verify you</h2>
                </div>
                <div class="four columns">
                    <img src="/images/three.png" class="steps">
                    <h2>Get connected</h2>
                </div>
            </div>
        
        <div class="row"></div>
        
	</div><!-- container -->

<!-- End Document
================================================== -->
</body>
</html>
