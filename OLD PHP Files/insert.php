<?php
session_start();
header('Location: verification.php');

    $phonetwil = $_SESSION[phone];
    $phonetwil = chr(43) . "1" . $phonetwil;

require "dbconnect.php";

$sql="INSERT INTO student (first, email, phone, have_room, city)
VALUES ('$_SESSION[first]','$_SESSION[email]','$phonetwil' ,'$_SESSION[have_room]' ,'$_SESSION[city]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

//hello my name is sean crowe

mysqli_close($con);


?>