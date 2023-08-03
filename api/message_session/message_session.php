<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['message']) && isset($_POST['status'])) {
	
		$_SESSION['flash']['message'] = $_POST['message'];
      	$_SESSION['flash']['success'] = $_POST['status'];
}

?>