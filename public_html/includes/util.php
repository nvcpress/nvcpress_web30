<?php
	function display_message($message)
	{

	require_once('/home/newvis8/public_html/Templates/header_3sections.php');
	
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
	//content_left
	require_once('/home/newvis8/public_html/Templates/content_left_section.php');	//error message
	echo "<div id='content_center_photo_club'>";
	echo "<br/><br/><h3 style='margin:50px' >$message</h3><br />";
	echo "</div>";
	
echo <<< BODY_END
	</body>
	</div><!--wrapper-->
BODY_END;

	}
	
	function display_just_message($message)
	{

		require_once('/home/newvis8/public_html/sandbox/Templates/header_section.php');
	
		//error message
		echo "<div id='content_center'>";
		echo "<br/><br/><h3 style='margin:50px' >$message</h3><br />";
		echo "</div>";
	}
	
	
	function maketable($result, $fieldarray){
		//count number of columns
		 $columns = count($fieldarray);
		//run the query
		 $itemnum = $result->num_rows;
		 if($itemnum > 0){
		  do{
		   echo "< tr >" ;
		   for($x = 0; $x < $columns; $x++){
			echo "< td >" .$items[$fieldarray[$x]]. "< /td >" ;
		   }
		   echo "< /tr >" ;
		  }while($items = $result->fetch_array);
		 }
	}
	
	function display_photo_club_faq_answer($message){

	require_once('/home/newvis8/public_html/Templates/header_3sections.php');
	
echo <<< BODY_BEGIN
	<body onload="MM_preloadImages('../img/icons/nvc_grey.png','../img/icons/pathway_grey.png','../img/icons/lighthouse.png','../img/icons/lighthouse_jr.png','../img/icons/aja_big.png')">
    <div id="wrapper" class="wrapper">
BODY_BEGIN;

	//logo section
	require_once('/home/newvis8/public_html/Templates/logo_login_section.php');
	//top-nav section
	require_once('/home/newvis8/public_html/Templates/photo_club_top_nav_section.php');
	//slider section
	require_once('/home/newvis8/public_html/Templates/slider_photo_club_section.php');
	//content_left
	require_once('/home/newvis8/public_html/Templates/content_photo_club_left_section.php');	
	//error message
	echo "<div id='content_center_photo_club'>";
	echo "<br/><br/><h3 style='margin:50px' >$message</h3><br />";
	echo "<form action='../photo_club_faq.php'>";
	echo "<input id='photo_club_faq_button' type='submit' value='Back to FAQ' style='background:#CFCCEC'</input>";
	echo "</form>";
	echo "</div><!--content_center_photo_club-->";
	
echo <<< BODY_END
	</body>
	</div><!--wrapper-->
BODY_END;
		
	}
	
	function sanitize_input_for_db($input) {
		//add slashes to control characters (', ", \, NUL)
		addslashes($input);
		//strip all html tags
		strip_tags($input);
		//convert any script tags to harmless character (eg: < will be &lt)
		htmlspecialchars($input);
		//return sanitized input
		return $input;	
	}
	
	//this function needs to expanded to accomodate team folders
	function upload_file($file){
		//check for errors
		if($_FILES['userfile']['error'] > 0){
			echo "Upload file $file failed: <br />";
			switch ( $_FILES['userfile']['error'] )
			{
				case 1: echo "File exceeded upload_max_filesize";
						break;
				case 2: echo "File exceeded max_file_size";
						break;
				case 3: echo "File only partially uploaded";
						break;
				case 4: echo "No file uploaded";
						break;
				case 6: echo "Cannot upload file: No temp directory specified";
						break;
				case 7: echo "Upload failed: Cannot write to disk";
						break;
				default: echo "Unknown error";
						break;
		
			}//swwitch
			exit;  
		}//if
		
		//check MIME type
		/*
		if($_FILES['userfile']['type'] != 'text/plain'){
			echo "Upload failed: File is not  plain text";
			exit;	
		}
		*/
		
		//if no error, put the file in a temp directory  *** note that a full path is used for upload directory 
		$moved_file = '/home/newvis8/public_html/uploads/' . $_FILES['userfile']['name'];
		//echo "temp name is: " . $_FILES['userfile']['tmp_name'];
		//echo "directory name is: " . dirname($_FILES['userfile']['name']);
		
		//making sure the file is uploaded file not a local file
		if(is_uploaded_file($_FILES['userfile']['tmp_name'])){
			
			//sleep(15);
			
			if(!move_uploaded_file($_FILES['userfile']['tmp_name'], $moved_file)){
				echo "Could not move file to destination folder";
				exit;
			}
		} else {
			echo "The file might not be uploaded file.  ALERT, check this";	
			echo "Filename: " . $_FILES['userfile']['name'];
			exit;
		}//if-else
		
		echo "File uploaded successfully <br />";
	}
	
	function browse_dir($dirname){
		$dir = opendir($dirname) or die ("can not open directory $dirname");
		echo "<p>Directory <b>" . $dirname . "</b> listing: </p><ul>";
		while(false != ($file = readdir($dir))){
			//strip out . and ..
			if($file != "." && $file != ".."){
				echo "<li>$file</li>";	
			}
		}//while
		
		echo "</ul>";
		closedir($dir);
	}
?>