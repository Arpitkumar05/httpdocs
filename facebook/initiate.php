<?php
// Include helper facebook class
require_once('classes/facebook_service.php');

// Initialize helper object 
$service = new FacebookService('000000000', 'This is the test message');

// Start session
if (!session_id())
	session_start();

// Write service object to session
$_SESSION['facebook_service'] = $service;

session_write_close();

// Request facebook auth from user
// This redirects the client to Facebook for authentication and authorization
$service->request_user_access_code();

die();
?>