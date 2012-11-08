<?php

require_once("../includes/config.php");
require_once("../includes/database.php");
require_once("../includes/security.php");

class TopNavSection {
	
	public function display() {
		
echo <<< EOHTML
	<div id="content_area" class="content_area">
        <div id="topnav">
            <ul>
                <li><a href="/root/index.php">HOME</a></li>
                <li>|</li>
                <li><a href="/root/gallery.php">GALLERY</a></li>
                <li>|</li>
                <li><a href="/root/nvc_forum.php" id="topnav_forum">FORUM</a></li>
                <li>|</li>
                <li><a href="/root/community.php">COMMUNITY</a></li>
                <li>|</li>
                <li><a href="/root/help.php">HELP</a></li>
                <li>|</li>
                <li><a href="/root/contact.php">CONTACT</a></li>
				<li>|</li>
				<li><a href="/root/login.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
				<li>|</li>
                <li><a href="/root/login.php">LOGIN</a></li>
				<li>|</li>
                <li><a href="/root/logout.php">LOGOUT</a></li>
            </ul>
        </div> <!--topnav-->
	</div>
EOHTML;
		
	}
}



?>