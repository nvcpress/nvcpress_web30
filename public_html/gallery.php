<?php
	require_once('/home/newvis8/public_html/Templates/header_gallery.php');
	
echo <<< BODY_BEGIN
	<body onload="MM_preloadImages('../img/icons/nvc_grey.png','../img/icons/pathway_grey.png','../img/icons/lighthouse.png','../img/icons/lighthouse_jr.png','../img/icons/aja_big.png')">
    <div id="wrapper" class="wrapper">
BODY_BEGIN;

	//logo section
	require_once('/home/newvis8/public_html/Templates/logo_login_section.php');
	//top-nav section
	require_once('/home/newvis8/public_html/Templates/top_nav_section.php');
	//slider section
	require_once('/home/newvis8/public_html/Templates/slider_section.php');
	//content php file 
	require_once('/home/newvis8/public_html/Templates/content_gallery.php');
	//footer section
	require_once('/home/newvis8/public_html/Templates/footer_section.php');
	
	
echo <<< BODY_END
	</body>
	</div><!--wrapper-->
BODY_END;

?>