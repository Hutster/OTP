<?php
    // you need to call the thingy
	require_once('db.php');
 
	$db = new DB();
 
	// Grab all the users (and their messages) from the database
	$users = $db->get_users();
 
	echo '<ul>';
 
	// Loop through each user and display how many votes they got
	foreach ($users as $user)
	{
		echo '<li>'.$user['name'].': '.$user['message'].'</li>';
	}
 
	echo '</ul>';
?>