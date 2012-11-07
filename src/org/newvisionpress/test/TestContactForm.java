package org.newvisionpress.test;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.WebDriverWait;
import org.testng.annotations.AfterTest;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

public class TestContactForm extends NVCwebLib{
	
	public String url = "http://newvisionpress.org";
	WebDriver driver;
	@BeforeTest
	public void setup(){
		//fireFoxSetup(url);
		driver = new FirefoxDriver();
		driver.get(url);
	}
	//improve this with data provider...
	@Test
	public void testContactForm() throws InterruptedException{
		clickElement("Photography", "id");
		//driver.wait();
		//WebDriverWait wait = new WebDriverWait(driver, 15);
		//wait.wait();
		
		driver.findElement(By.id("contact")).click();
		
		
//		clickLink(Elements.contactId, byId);
//		checkPageTitle(Elements.contactId);
//		
//		enterNameContactForm("Jay");
//		enterEmailContactForm("heedonkyung@yahoo.com");
//		enterPhoneContactForm("408-988-8958");
//		enterMessageContactForm("This is message");
//		clickLink(Elements.submitId, byId);
//		verifyTextExits("Thank you for contacting");
	}
	@AfterTest
	public void cleanup(){
		//tearDown();
	}
}
