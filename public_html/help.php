<?php
	require_once('/home/newvis8/public_html/sandbox/Templates/header_section.php');
	
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
	//forum content section 
	require_once('/home/newvis8/public_html/Templates/content_help_section.php');
	//footer
	require_once('/home/newvis8/public_html/Templates/footer_section.php');
	
	
echo <<< BODY_END
	</body>
	</div><!--wrapper-->
BODY_END;

?>