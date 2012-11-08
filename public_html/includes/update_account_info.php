<?php
	require_once('../includes/database.php');
	require_once('../includes/security.php');
	require_once('../includes/webPages.php');
	
	$db = new MySQLDatabase;
	
	$fname = $db->sanitizeInput($_POST['firstname']);
	$lname = $db->sanitizeInput($_POST['lastname']);
	$email = $db->sanitizeInput($_POST['email']);
	$phonenum = $db->sanitizeInput($_POST['phonenumber']);
	$username=$_SESSION['valid_user'];
	//$teams_checked = sanitize_input_for_db($_POST['team']);
	$password = sha1($_POST['password']);
	$address = $db->sanitizeInput($_POST['address']);
	$city = $db->sanitizeInput($_POST['city']);
	$state= $db->sanitizeInput($_POST['state']);
	$zip = $db->sanitizeInput($_POST['zip']);
	$table = 'member';
	
	//check to see if password is entered
	echo "confirmed passwd: " . $_POST['confirm_password'] . "\n";
	echo "passwd: " . $_POST['password'];
	
	if($_POST['password'] == $_POST['confirm_password']){
		$query = "UPDATE $table SET fname = '$fname', lname='$lname', password='$password', phone_number='$phonenum',  street='$address', city='$city', state='$state', zip='$zip' 
		WHERE username='$username'";
		$result = $db->query($query);
		$message = "Your account had been updated successfully.";
	} else {
		$message = "Both password must be the same, Please try again";	
	}

	$db->closeConnection();
	
	//diplay message
	$wp = new WebPages("NVC Account Update");
	echo $wp->content_area_tag;
	$wp->displayLeftMenus();
	$wp->displayContentFullWidthWithLeftMenu($message);
	$wp->displayFooter();
	echo $wp->content_area_tag_end;
	echo $wp->wrapper_tag_end;
	echo $wp->body_tag_end;
	
?>