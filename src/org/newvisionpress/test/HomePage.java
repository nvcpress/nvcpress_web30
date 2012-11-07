package org.newvisionpress.test;

import junit.framework.Assert;

import org.testng.annotations.AfterTest;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.DataProvider;
import org.testng.annotations.Test;

public class HomePage extends NVCwebLib {
	@Test(enabled = true)
	  public void topNavLinkVerify() {
		  clickElement(Elements.galleryId, "id");
		  //forumLink();
		  //communityLink();
		  //helpLink();
		  //contactLink();
		  welcomeMessageVerify();
		  //loginLink();
		  clickHomeLink();
	  }

	@Test
	public void verifyWelcomeMessage(){
		welcomeMessageVerify();
	}
	
	@Test
	  @DataProvider(name = "linkData")	    
	  public Object[][] createData1() throws Exception{
	  	//provide link data (a digit was assigned to each page number since switch doesn't take String value (before java 7)
	      Object[][] retObjArr=getTableArray("resource\\data\\newvisionpress_data.xls", "link_data",  "link_data");
	      return(retObjArr);
	  }
	  @Test (enabled = false, dataProvider = "linkData")
	  public void testLinkWithExcelData(String page0, String page1, String page2, String page3, String page4, String page5,
			  String page6, String page7, String page8, String page9, String end_page, String statusMessage){
	   	//driver.manage().timeouts().implicitlyWait(5, TimeUnit.SECONDS);
	  		String[] pageNumber = {page0, page1, page2, page3, page4, page5, page6, page7, page8, page9};
		  //case statement goes here and for loop wraps case statement
		  for(String s: pageNumber){

			//check to see if the login status message is there
			loginStatusMessage();
			
			//convert string to int since switch doesn't take string value prior to java 7
			int i = Integer.parseInt(s);
			
			switch(i){
			case 0:
				//don't do anything
			case 1:
				clickHomeLink();
				break;
			case 2:
				//galleryLink();
				break;
			case 3:
				clickForumLink();
				break;
			case 4:
				communityLink();
				break;
			case 5:
				helpLink();
				break;
			case 6:
				contactLink();
				break;
			case 7: 
				loginLink();
				break;
			case 8:
				logoutLink();
				break;
			default:
				Assert.fail("Invalid page number, please check the Excel file" + "i is: " + i);
			}//end switch
				
		  }//end for
	  }
	  @Test(enabled = false)
	  public void rightExternalLinkVerify() throws InterruptedException{
		  //send one of these: 'newvisionchurch', 'lighthousejr', 'pathway', 'youthlighthouse', 'nvc-iworship'
		  //for url: 'http://newvisionchurch.org/cms/', 'http://www.pathwaybible.org/', 'http://www.youthlighthouse.org//', 'http://lighthousejr.org/'
		  //'http://nvc-iworship.com/'
		  verifyExternalLink("newvisionchurch", "id","http://newvisionchurch.org/cms/");
		  verifyExternalLink("pathway", "id", "http://www.pathwaybible.org/");
		  verifyExternalLink("youthlighthouse", "id", "http://www.youthlighthouse.org//");
		  verifyExternalLink("lighthousejr", "id", "http://lighthousejr.org/");
		  verifyExternalLink("nvc-iworship", "id", "http://nvc-iworship.com/");

		  logoutLink();
	  }
	  @Test
	  public void footerDisplayedVerify(){
		  verifyFooterText();
	  }
	  @Test(enabled = false)
	  public void accordionMenuVerify(){
		  int pressMenuNumber = super.accordionMenuOpen("press");
		  	super.accordionSubMenuClick(pressMenuNumber, 2); //press team list page
		  	if(super.isLoggedIn()){
		  		super.login("hkyung", "seaweed");
		  		super.accordionMenuOpen("press");
		  		super.accordionSubMenuClick(pressMenuNumber, 2);
		  	} else {
		  		//***verify Press member list
		  	}
		  	//super.modalPopupVerify(); //doesn't work
		  int photographyMenuNumber = super.accordionMenuOpen("photography");
		  int computerMenuNumber = super.accordionMenuOpen("computer");
		  int displayMenuNumber = super.accordionMenuOpen("display");
		  int designMenuNumber = super.accordionMenuOpen("design");
		  int editMenuNumber = super.accordionMenuOpen("edit");
		  int publicMenuNumber = super.accordionMenuOpen("public");
		  int adminMenuNumber = super.accordionMenuOpen("admin");
		  int otherMenuNumber =  super.accordionMenuOpen("other");
		  
	  }
	  
	  @Test
	  public void modalPopUp(){
		  modalPopupVerify();
	  }
	  
	  //setup and clean up  ------------------------------------------------------------------------------------
	  @BeforeTest
	  public void beforeTest() {
		  setupChrome("http://newvisionpress.org/sandbox_test/public_html/public/home.php");
	  }

	  @AfterTest
	  public void afterTest() {
		  tearDown();
	  }

}
