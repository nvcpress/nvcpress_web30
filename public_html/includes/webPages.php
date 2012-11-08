<?php

class WebPages {
	//* this class should be initiated at the beginning of every web page
	//* instantiate with title
	//* setup all javascript and CSS tags AND beginngin and ending tags for CSS
	//* this class will display header section, top navigation section, and slider for images when initiated
	//* other common display blocks available as methods
	
	//attributes
	public $title;
	public $head_tag = "<head>";
	public $head_tag_end = "</head>";
	public $body_tag = <<<BODY_TAG
	<body onload="MM_preloadImages('../img/icons/nvc_grey.png','../img/icons/pathway_grey.png','../img/icons/lighthouse.png','../img/icons/lighthouse_jr.png','../img/icons/aja_big.png')">
BODY_TAG;
	public $body_tag_end = "</body>";
	public $wrapper_tag = "<div id='wrapper' class='wrapper'>";
	public $wrapper_tag_end = "</div><!--wrapper-->";
	public $content_area_tag = '<div id="content_area" class="content_area">';
	public $content_area_tag_end = "</div><!--content_area-->";
	public $content_center_tag = '<div id="content_center" class="content_center">';
	public $content_center_tag_end = "</div><!--content_center-->";
	public $content_full_width_tag =  '<div id="content_full_width" class="content_full_width">';
	public $content_full_width_tag_end = "</div><!--content_full_width-->";
	public $footer_tag = '<div id="footer" class="footer">';
	public $footer_tag_end = "</div><!--footer-->";
	public $content_left_wide_tag = '<div id="content_left_wide" class="content_left_wide">';
	public $content_left_wide_tag_end = "</div><!--content_left_wide-->";
	public $content_right_wide_tag = "<div id='content_right_with_left_menu'>";
	public $content_right_wide_tag_end = "</div><!--content_right_with_left_menu-->";
	
	//constructor
	public function __construct($title){
		echo $this->head_tag;  //start of head section
		$this->title = $title;
		$this->setTitle();
		$this->javaScriptAndCSS();
		$this->javaScriptFunctions();
		echo $this->head_tag_end; //end of head section
		echo $this->body_tag;  //start of body
		echo $this->wrapper_tag; //start of wrapper div tag
		$this->displayHeader();
		$this->displayTopNavSection();
		$this->displaySlider();
		
		//$this->content_area_tag;
		//echo $this->wrapper_tag_end;
		//echo $this->body_tag_end;
	}
	
	//methods
	public function setTitle(){
		echo "<title>" . $this->title . "</title>";
	}
	
	public function javaScriptAndCSS(){
echo <<< SCRIPT
		<script type="text/javascript" src="../js/jquery.js"></script>
    	<script type="text/javascript" src="../js/slider.js"></script>
    	<script type="text/javascript" src="../js/popup.js"></script>
        <script src="../js/menu_expand.js" type="text/javascript"></script>
        <script type="text/javascript" src="../js/featureList.js"></script> 
        <script type="text/javascript" src="../js/jquery.jcarousel.min.js"></script> 
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
        <link rel="stylesheet" type="text/css" href="../css/skin.css"/>
SCRIPT;
	}
       
    public function javaScriptFunctions(){
echo <<< JAVASCRIPT_FUNCTION
    <script type="text/javascript">
    // This is the script for the banner slider
        $(document).ready(function() {
            $('#slider').s3Slider({
                timeOut: 3000
            });
        });
    function MM_preloadImages() { //v3.0
      var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
        var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
        if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
    }
    
    function MM_swapImgRestore() { //v3.0
      var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
    }
    
    function MM_findObj(n, d) { //v4.01
      var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
        d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
      if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
      for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
      if(!x && d.getElementById) x=d.getElementById(n); return x;
    }
    
    function MM_swapImage() { //v3.0
      var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
       if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
    }
    </script>
    
    <script language="javascript">
        $(document).ready(function() {
    
            $.featureList(
                $("#tabs li a"),
                $("#output li"), {
                    start_item	:	1
                }
            );
        });
    </script>
    <script type="text/javascript">
		jQuery(document).ready(function() {
    	jQuery('#mycarousel').jcarousel({
        // Configuration goes here
    	});
		});
	</script>
JAVASCRIPT_FUNCTION;
    }
    	
	public function displayHeader(){
		//logo and login status message
        if($_SESSION['valid_user']){
			$login_message =  "You are logged in as " . $_SESSION['valid_user'];	
		}else {
			$login_message = "Welcome to NVC Press web.";	
		}

echo <<< EOHTML
		<div id="logoxx" class="logoxx" >
        	<a href="http://newvisionpress.org/sandbox_test/public_html/public/home.php">
            <img src="../img/logo/newvisionpress.png" alt="logo" name="logo" width="267" height="67" id="logo" align="left" /></a>
			<span style="float:right; padding-right:30px; padding-top:50px"><a href="../public/user_profile.php" style="color:orange">$login_message</a></span>
		</div>
EOHTML;
	}
	
	public function displayTopNavSection(){
    //forum section is in developement and currently disabled (just place holder)
	echo <<< EOHTML
	<div id="content_area" class="content_area">
        <div id="topnav">
            <ul>
                <li><a href="../public/home.php" id="home">HOME</a></li>
                <li>|</li>
                <li><a href="../public/gallery.php" id="gallery">GALLERY</a></li>
                <li>|</li>
                <li><a href="../public/community.php" id="community">COMMUNITY</a></li>
                <li>|</li>
                <li><a href="../public/help.php" id="help">HELP</a></li>
                <li>|</li>
                <li><a href="../public/contact.php" id="contact">CONTACT</a></li>
				<li>|</li>
				<li><a href="../public/login.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
				<li>|</li>
                <li><a href="../public/login.php" id="login">LOGIN</a></li>
				<li>|</li>
                <li><a href="../public/logout.php" id="logout">LOGOUT</a></li>
            </ul>
        </div> <!--topnav-->
EOHTML;
	}
    
    public function displaySlider(){
    echo <<<SLIDER
   		<div id="slider">
    
            <ul id="sliderContent">
            
                <!-- use this list item if you want to include a link -->				
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/world_vision_choir.png" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/backtoschool_bw.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/lighthouse_service.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/benediction.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/ring.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/baptism-wipe-bw.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>    
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/christmas-colors.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>    
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/praise.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/singing_competion.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/christmas1.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/marcus-worship.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/d4c.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/wind_and_bread.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/baptism-flower.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/christmas-kids.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/cent.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/family_night2.png" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/backtoschool5.png" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>    
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/foot_volleyball.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/christmas-kids2.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/korean-school.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>    
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/set2011.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>    
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/mothers-day.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>    
                
                <li class="sliderImage">
                    <a href=""><img src="../img/banner/prayer.jpg" /></a>
                    <span class="top"><strong>This is an image title</strong><br />text</span>
                </li>   
                 
                <div class="clear sliderImage"></div>
                
            </ul><!--sliderContent-->
        
        </div> <!-- slider -->
SLIDER;
    }
    
    public function displayLeftMenus(){
    echo <<< EOHTML
	  <div id="content_left" class="content_left">
		<ul id="content_left_navigation" class="menu">
		
		   <li> <a href="#" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">Press Department</a>
                <ul>

                  <li><a href="#" id="press_dept_ministry" style="color:#373737; background-color:#E1E1FF; width:101%" data-reveal-id="myModal27">Press Dept. <b>Ministry</b></a></li>
                  	        <div id="myModal27" class="reveal-modal">
                            <h1>Press Department Ministry</h1>
                            <p>뉴비전교회 출판부는 6개팀(편집/취재팀, 사진팀, 컴퓨터팀, 홍보팀, 전시팀, 디자인팀)으로 구성이 되어 있으며, 제반 교회 내부 외부 (각종 신문사,방송등) 
							알림에 대한 홍보를 담당하며, 교회 자체로는 뉴비전계간지 (봄,여름,가을,겨울호)가 발행이 되어 성도님들에게 배부되고, 교회의 출판물 디자인, 사진 촬영, 
							달란트 홀 전시, 출판 사역의 전산화/효율화등의 사역으로 섬기는 부서입니다. <br/><br/><br/>
                                <a href="mailto:ykim_21@newvisionpress.com" style="color:white">email NVC press department director</a></p>
                            <a class="close-reveal-modal">&#215;</a>
                            </div> <!--myModal-->
                  <li><a href="press_dept_member_list.php" style="color:#373737; background-color:#E1E1FF; width:101%">NVC Press Dept. <b>member</b> list</a></li>
                  <li><a href="login.php" style="color:#373737; background-color:#E1E1FF; width:101%">NVC Press Dept. member <b>Login</b></a></li>
                  <li><a href="logout.php" style="color:#373737; background-color:#E1E1FF; width:101%">NVC Press Dept. member <b>Logout</b></a></li>
                  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%" data-reveal-id="myModal20"><b>Join</b> or <b>Contact</b> NVC Press Dept.</a></li>
                  	        <div id="myModal20" class="reveal-modal">
                            <h1>Join or Contact NVC Press department</h1>
                            <p>We always welcome new members to NVC Press department.  For more information, please visit 'MINISTRY' page.  
                            	Feel free to contact NVC Press team to join or any questions you might have. <br/><br/><br/>
                                <a href="mailto:ykim_21@newvisionpress.com" style="color:white">email NVC press department director</a></p>
                            <a class="close-reveal-modal">&#215;</a>
                            </div> <!--myModal-->
                </ul>
              </li>
		  
		  <li> <a href="#" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">Photography Team</a>
			<ul>
			  <li><a href="photography_team_home.php" style="color:#373737; background-color:#E1E1FF; width:101%">Photography Team <b>Home</b></a></li>
			  <li><a href="photo_request_form.php" style="color:#373737; background-color:#E1E1FF; width:101%">NVC event photo request</a></li>
			  <li><a href="photoshoot_schedule.html" style="color:#373737; background-color:#E1E1FF; width:101%">Field Trip Schedule</a></li>
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%">Video(under construction)</a></li>
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%" data-reveal-id="myModal28">Photography team <b>Ministry</b></a></li>
						<div id="myModal28" class="reveal-modal">
						<h1>Photography Team Ministry</h1>
						<p>	1.  교회 홈피 포토-스케치 에 들어 가는 행사 사진 촬영.<br/>
							2. 뉴비전교회 계간지 작성에 필용한 사진 촬영.<br/>
							3. 주요 행사 사진으로 기록 및 관리, 연말 슬라이드쇼.<br/>
							4. 각교인 및 단체 그룹 사진 촬영, 주소록 작성에 사용.<br/><br/><br/>
							<a href="mailto:sprk408@newvisionpress.com" style="color:white">email photography team lead</a></p>
						<a class="close-reveal-modal">&#215;</a>
						</div> <!--myModal-->
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%" data-reveal-id="myModal21"><b>Join</b> or <b>Contact</b> Photo team</a></li>
						<div id="myModal21" class="reveal-modal">
						<h1>Join or Contact NVC Photography Team</h1>
						<p>We always welcome new members to NVC photography team.  For more information, please visit 'MINISTRY' page.  
							Feel free to contact photography team to join or any questions you might have. <br/><br/><br/>
							<a href="mailto:sprk408@newvisionpress.com" style="color:white">email photography team lead</a></p>
						<a class="close-reveal-modal">&#215;</a>
						</div> <!--myModal-->
			</ul>
		  </li>
		  
		  <li> <a href="#" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">Computer Team</a>
			<ul>
			  <li><a href="computer_team_home.php" style="color:#373737; background-color:#E1E1FF; width:101%">Computer Team <b>Home</b></a></li>
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%">NVC Press Web: How to</a></li>
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%" data-reveal-id="myModal29">Computer team <b>Ministry</b></a></li>
						<div id="myModal29" class="reveal-modal">
						<h1>Computer team Ministry</h1>
						<p>	1.	출판부 컴퓨터 관련 부품 관리<br/>
							2.	출판부 컴퓨터 보안 관리<br/>
							3.	출판부 웹 사이트 관리 및 디자인<br/>
							4.	출판부 관련 자료 전산화 <br/><br/><br/>
							<a href="mailto:admin@newvisionpress.com" style="color:white">email Computer team lead</a></p>
						<a class="close-reveal-modal">&#215;</a>
						</div> <!--myModal-->
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%">Press documents: Admin Only</a></li>
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%" data-reveal-id="myModal22"><b>Join</b> or <b>Contact</b> Photo team</a></li>
						<div id="myModal22" class="reveal-modal">
						<h1>Join or Contact NVC Computer Team</h1>
						<p>We always welcome new members to NVC Computer team.  For more information, please visit 'MINISTRY' page.  
							Feel free to contact photography team to join or any questions you might have. <br/><br/><br/>
							<a href="mailto:admin@newvisionpress.com" style="color:white">email Computer team lead</a></p>
						<a class="close-reveal-modal">&#215;</a>
						</div> <!--myModal-->
			</ul>
		  </li>
		  
		  <li> <a href="#" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">Display Team</a>
			<ul>
              <li><a href="display_team_home.php" style="color:#373737; background-color:#E1E1FF; width:101%">Display Team <b>Home</b></a></li>
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%" data-reveal-id="myModal30">Display team <b>Ministry</b></a></li>
						<div id="myModal30" class="reveal-modal">
						<h1>Display team Ministry</h1>
						<p>	1.	전시 아이디어 구상<br/>
							2.	작품모집과 전시<br/>
							3.	달란트홀웨이 관리<br/><br/><br/>
							<a href="ksong35@newvisionpress.com" style="color:white">email Display team lead</a></p>
						<a class="close-reveal-modal">&#215;</a>
						</div> <!--myModal-->
						
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%" data-reveal-id="myModal23"><b>Join</b> or <b>Contact</b> Display team</a></li>
						<div id="myModal23" class="reveal-modal">
						<h1>Join or Contact NVC Computer Team</h1>
						<p>We always welcome new members to NVC Computer team.  For more information, please visit 'MINISTRY' page.  
							Feel free to contact Display team to join or any questions you might have. <br/><br/><br/>
							<a href="mailto:ksong35@newvisionpress.com" style="color:white">email Display team lead</a></p>
						<a class="close-reveal-modal">&#215;</a>
						</div> <!--myModal-->
						
			</ul>
		  </li>
		  
		  <li> <a href="#" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">Design Team</a>
			<ul>
              <li><a href="design_team_home.php" style="color:#373737; background-color:#E1E1FF; width:101%">Design Team <b>Home</b></a></li>
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%" data-reveal-id="myModal31">Design team <b>Ministry</b></a></li>
						<div id="myModal31" class="reveal-modal">
						<h1>Design team Ministry</h1>
						<p>	1.	뉴비전호 디자인<br/>
							2.	교회 부흥회 포스터, 엽서, 순서지, 신문광고 디자인<br/>
							3.	교회 각종 행사 포스터, 엽서, 순서지, 신문광고 디자인<br/>
							4.	교회 다른 부서에서 의뢰한 것등을 디자인<br/><br/><br/>
							<a href="mailto:bippacman@newvisionpress.com" style="color:white">email Design team lead</a></p>
						<a class="close-reveal-modal">&#215;</a>
						</div> <!--myModal-->
						
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%" data-reveal-id="myModal24"><b>Join</b> or <b>Contact</b> Design team</a></li>
						<div id="myModal24" class="reveal-modal">
						<h1>Join or Contact NVC Design Team</h1>
						<p>We always welcome new members to NVC Computer team.  For more information, please visit 'MINISTRY' page.  
							Feel free to contact Display team to join or any questions you might have. <br/><br/><br/>
							<a href="mailto:bippacman@newvisionpress.com" style="color:white">email Design team lead</a></p>
						<a class="close-reveal-modal">&#215;</a>
						</div> <!--myModal-->
						
			</ul>
		  </li>
		  
		  <li> <a href="#" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">Editor/Report Team</a>
			<ul>
              <li><a href="editor_team_home.php" style="color:#373737; background-color:#E1E1FF; width:101%">Edit/Report Team <b>Home</b></a></li>
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%">Editor/Report team <b>Ministry</b></a></li>
			  
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%" data-reveal-id="myModal32">Editor/Report team <b>Ministry</b></a></li>
						<div id="myModal32" class="reveal-modal">
						<h1>Editor/Report team Ministry</h1>
						<p>	Need to get content from the team<br/><br/><br/>
							<a href="mailto:bippacman@newvisionpress.com" style="color:white">email Editor/Report team lead</a></p>
						<a class="close-reveal-modal">&#215;</a>
						</div> <!--myModal-->
			  
			  
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%" data-reveal-id="myModal25"><b>Join</b> or <b>Contact</b> Editor/Report team</a></li>
						<div id="myModal25" class="reveal-modal">
						<h1>Join or Contact NVC Editor/Report Team</h1>
						<p>We always welcome new members to NVC Editor/Report team.  For more information, please visit 'MINISTRY' page.  
							Feel free to contact photography team to join or any questions you might have. <br/><br/><br/>
							<a href="mailto:mailtoyoo@newvisionpress.com" style="color:white">email Editor/Report team lead</a></p>
						<a class="close-reveal-modal">&#215;</a>
						</div> <!--myModal-->
			</ul>
		  </li>
		  
		  <li> <a href="#" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">Public Relation Team</a>
			<ul>
              <li><a href="pr_team_home.php" style="color:#373737; background-color:#E1E1FF; width:101%">Public Relation Team <b>Home</b></a></li>
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%" data-reveal-id="myModal33">Public Relation team <b>Ministry</b></a></li>
						<div id="myModal33" class="reveal-modal">
						<h1>Public Relation team Ministry</h1>
						<p>	1.	뉴비전교회의 내/외부 활동과 행사, 사역을 지역사회에 언론매체(신문/방송/ 웹/소셜미디어등)를<br/>
							통하여 올바르게 알림으로써 교회의 이미지와 가치를 높인다<br/>
							2.  교회자체 또는 지역사회의 필요에 부응하는 홍보아이디어 프로그램을 개발하여 뉴비전교회의 홍보 또느 전도의 기회로 활용한다.<br/>
							3. 내부교인, 사역자와의 원활한 소통의 기회를 제공하여 상호 신뢰하는 관계를 도모한다 <br/>
							4. 언론매체와의 바람직한 유대관계를 형성하고 유지발전시켜 교회의 이미지와 가치를 높인다<br/><br/><br/>
							<a href="mailto:jonggan.kim@newvisionpress.com" style="color:white">email Public Relation team lead</a></p>
						<a class="close-reveal-modal">&#215;</a>
						</div> <!--myModal-->

			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%" data-reveal-id="myModal26"><b>Join</b> or <b>Contact</b> Public Relation team</a></li>
						<div id="myModal26" class="reveal-modal">
						<h1>Join or Contact NVC Public Relation Team</h1>
						<p>We always welcome new members to NVC Public Relation team.  For more information, please visit 'MINISTRY' page.  
							Feel free to contact photography team to join or any questions you might have. <br/><br/><br/>
							<a href="mailto:jonggan.kim@newvisionpress.com" style="color:white">email Public Relation team lead</a></p>
						<a class="close-reveal-modal">&#215;</a>
						</div> <!--myModal-->
			</ul>
		  </li>
		  
		  <li> <a href="#" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">Admin Tasks</a>
			<ul>
			  <li><a href="register.php" style="color:#373737; background-color:#E1E1FF; width:101%">New Vision Press <b>Register</b></a></li>
			  <li><a href="edit_pressteam_member.php" style="color:#373737; background-color:#E1E1FF; width:101%"><b>Add/Modify</b> Press team <b>member</b></a></li>
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%"><b>Add</b> Photo set(under construction)</a></li>
			  <li><a href="#" style="color:#373737; background-color:#E1E1FF; width:101%">Add press news to home page(under construction)</a></li>
			</ul>
		  </li>
		  
		 <li> <a href="#" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">Other New vision Church sites</a>
			<ul>
			  <li><a href="http://newvisionchurch.org" target="_blank" style="color:#373737; background-color:#E1E1FF; width:101%">New Vision Church</a></li>
			  <li><a href="http://www.pathwaybible.org/" target="_blank" style="color:#373737; background-color:#E1E1FF; width:101%">Pathway</a></li>
			  <li><a href="http://www.youthlighthouse.org//" target="_blank" style="color:#373737; background-color:#E1E1FF; width:101%">Lighthouse</a></li>
			  <li><a href="http://lighthousejr.org/" target="_blank" style="color:#373737; background-color:#E1E1FF; width:101%">Lighthouse Jr.</a></li>
			  <li><a href="http://www.nvc-iworship.com/" target="_blank" style="color:#373737; background-color:#E1E1FF; width:101%">AJA BIG</a></li>                
			</ul>
		  </li>
						
		</ul>
	  </div> <!--content_left-->
	
EOHTML;
    }
    
    public function displayExternalLinkIcons(){
    echo <<< EOHTML
	<body>
          <div id="content_right" class="content_right">
				<ul>                	
					<li>
					<a href="http://www.newvisionchurch.org/" target="_blank">
					<img src="/img/icons/nvc_desat.png" class="detail_image" id="newvisionchurch" onmouseover="MM_swapImage('detail_image11','','../img/icons/nvc.png',1)" 
						onmouseout="MM_swapImgRestore()" /></a>
					</li>
					<li>
					<a href="http://www.pathwaybible.org/" target="_blank">
					<img src="/img/icons/pathway.png" class="detail_image" id="pathway" onmouseover="MM_swapImage('detail_image1','','../img/icons/pathway_grey.png',1)"
						onmouseout="MM_swapImgRestore()" /></a>
					</li>
					<li>
					<a href="http://www.youthlighthouse.org//" target="_blank">
					<img src="/img/icons/lighthouse_desat.png" class="detail_image" id="youthlighthouse" onmouseover="MM_swapImage('detail_image12','','../img/icons/lighthouse.png',1)" 
						onmouseout="MM_swapImgRestore()" /></a>
					</li>
					<li>
					<a href="http://lighthousejr.org/" target="_blank">
					<img src="/img/icons/lighthouse_jr_desat.png" class="detail_image" id="lighthousejr" onmouseover="MM_swapImage('Image1','','../img/icons/lighthouse_jr.png',1)" 
						onmouseout="MM_swapImgRestore()"  />
					</a>
					</li>   
					<li>
					<a href="http://www.nvc-iworship.com/" target="_blank">
					<img src="/img/icons/aja_big_desat.png" id="nvc-iworship" onmouseover="MM_swapImage('Image2','','../img/icons/aja_big.png',1)" 
						onmouseout="MM_swapImgRestore()"   />
					</a>
					</li>   
              	</ul>       
          </div><!--content_right-->
	</body>
EOHTML;
    }
	
    public function displayContentCenter($content_center){
    	//* need to implement vertical and possibly horizontal scroll bar
        //* for 3 section content areas
        echo $this->content_center_tag;
		echo $content_center;
        echo $this->content_center_tag_end;
    }
    
    public function displayContentFullWidth($content){
    	echo $this->content_full_width_tag;
        echo $content;
        echo $this->content_full_width_tag_end;
    }
    
    public function displayContentFullWidthWithExternalLinkIcons($content){
    	echo $this->content_left_wide_tag;
        echo $content;
        echo $this->content_left_wide_tag_end;
    }
    
    public function displayContentFullWidthWithLeftMenu($content){
        echo $this->content_right_wide_tag;
        echo $content;
        echo $this->content_right_wide_tag_end;
    }
    
    public function displayFooter(){
    	echo $this->footer_tag;
echo <<<FOOTER
                <p>&copy;2011 Web Development, Maintenance & Hosting by NVC press computer team, additional programming by NVC press team.  Contact web master jayhkyung@gmail.com</p>
FOOTER;
        echo $this->footer_tag_end;
    }
    
    public function displayPhotographyTeamLeftMenu(){
	echo <<< EOHTML
	<body>
	  <div id="content_left" class="content_left">
		<ul id="content_left_navigation" class="menu">
		
		  <li> <a href="#" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">Photography Team Home</a>
		  </li>
		  
		  <li> <a href="/root/photography_team/open_school.php" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">Open School Photography Class</a>
		  </li>
		   		  
		  <li> <a href="/root/photography_team/file_upload.php" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">File Upload/Download</a>
		  </li>
		  		  
		  <li> <a href="/photo_team/photoshoot_schedule.html" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">Field Trip Schedule</a>
		  </li>
		  
		  <li> <a href="#" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">Team Projects</a>
		  </li>
		  
		  <li> <a href="#" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">Team Contact</a>
		  </li>
		    
		  <li> <a href="#" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">Team Meeting</a>
		  </li>
		  
		  <li> <a href="#" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">FAQ</a>
		  </li>
		  
		  <li> <a href="/root/nvc_forum.php" style="color:#BB5E00; border:1px solid #CCC; background-color:white; width:107%">Forum</a>
		  </li>
						
		</ul>
	  </div> <!--content_left-->
	
	</body>
EOHTML;
	}
}


?>