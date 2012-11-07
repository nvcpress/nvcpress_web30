<?php
	require_once('/home/newvis8/public_html/php/db_util.php');
	require_once('/home/newvis8/public_html/php/session.php');
	require_once('/home/newvis8/public_html/php/util.php');
	
	$message = "Thank you for visiting New Vision Press Web site.  You have Logged out from NVC press web.<br />";
	display_message($message);
	sign_out();

?>
