<?php
// Include helper facebook class
require_once('classes/FacebookService.php');

// if authorization code is sent back
if(isset($_GET['code'])) {
	// Start session
	if (!session_id())
		session_start();
	
	// Grab facebook service object from session
	$service = $_SESSION['facebook_service'];
	
	if(isset($service)) {
		// Set the user_access_code returned from Facebook
		$service->user_access_code = $_GET['code'];
		
		// Publish message
		$service->publish();
		
		// clear sessioned object
		$_SESSION['facebook_service'] = '';
	}
}

// if facebook sends us back an error message
if(isset($_GET['error'])) {
	// Handle error
}
?>