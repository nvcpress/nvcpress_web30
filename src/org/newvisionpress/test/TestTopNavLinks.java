package org.newvisionpress.test;

import org.testng.annotations.AfterTest;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

public class TestTopNavLinks extends NVCwebLib{
	
	public String url = "http://newvisionpress.org";
	
	@BeforeTest
	public void setup(){
		setupChrome(url);
	}
	@Test
	public void testTopNavLinks(){
		clickElement(Elements.galleryId, byId);
			checkPageTitle(Elements.galleryId);
		clickElement(Elements.communityId, byId);
			checkPageTitle(Elements.communityId);
		clickElement(Elements.helpId, byId);
			checkPageTitle(Elements.helpId);
		clickElement(Elements.contactId, byId);
			checkPageTitle(Elements.contactId);
		clickElement(Elements.homeId, byId);
			checkPageTitle(Elements.homeId);
		clickElement(Elements.loginId, byId);
			checkPageTitle(Elements.loginId);
		clickElement(Elements.logoutId, byId);
			checkPageTitle(Elements.logoutId);
	}
	@AfterTest
	public void cleanup(){
		tearDown();
	}
}
