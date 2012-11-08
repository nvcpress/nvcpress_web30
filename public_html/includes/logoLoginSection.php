<?php

require_once("../includes/config.php");
require_once("../includes/database.php");
require_once("../includes/security.php");

class LogoAndLoginSection {
	//attributes
	
	//constructor
	
	//methods
	
	public function display(){
		if($_SESSION['valid_user']){
			$login_message =  "You are logged in as " . $_SESSION['valid_user'];	
		}else {
		$login_message = "Welcome to NVC Press web.";	
		}


echo <<< EOHTML
		<div id="logoxx" class="logoxx" >
            <img src="../../img/logo/newvisionpress.png" alt="logo" name="logo" width="267" height="67" id="logo" align="left" />
			<span style="float:right; padding-right:30px; padding-top:50px"><a href="/root/user_profile.php" style="color:orange">$login_message</a></span>
		</div>
EOHTML;
	} //method display()
	
} //class LogoAndLoginSection





?>