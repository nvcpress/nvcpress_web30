package org.newvisionpress.test;

import junit.framework.Assert;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.testng.annotations.AfterTest;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;
import org.testng.annotations.BeforeMethod;
import org.testng.annotations.DataProvider;

public class TestLinks {
	
	public String user;
	public String password;
	public static final String loginStatusWelcomeMessage = "Welcome to NVC Press web.";
	public String loginStatusUserId = "You are logged in as ";  //user id needs to be attached at the end
	
	WebDriver driver;
	
	//setup and teardown methods ----------------------------------------------------------------
	public void chromeSetup() {
		System.setProperty("webdriver.chrome.driver", "C:\\data\\programming\\selenium_chrome_driver\\chromedriver.exe");
		driver = new ChromeDriver();
		driver.get("http://newvisionpress.org");
	}
	
	public void firefoxSetup() {
		System.out.println("doing the setup!");
		//System.setProperty("webdriver.firefox.driver", "C:\\Program Files (x86)\\Mozilla Firefox\\firefox.exe");
		System.out.println("setting the driver");
		driver = new FirefoxDriver();
		System.out.println("now trying to start the newvisionprss");
		driver.get("http://google.com");
	}
	
	public void setCredential(String user, String password){
		this.user = user;
		this.password = password;
		this.loginStatusUserId += user;
	}

	public void tearDown(){
		driver.quit();
	}
	
	//Top navigation links and login status message ---------------------------------------------
	public void homeLink(){
		try{
			driver.findElement(By.xpath(".//*[@id='topnav']/ul/li[1]/a")).click();
		} catch (Exception e){
			Assert.fail("Can't find 'HOME' link from top navigation menu");
		}

	}
	
	public void galleryLink(){
		try{
			driver.findElement(By.xpath(".//*[@id='topnav']/ul/li[3]/a")).click();
		} catch (Exception e){
			Assert.fail("Can't find 'GALLERY' link from top navigation menu");
		}

	}
	
	public void forumLink(){
		try{
			driver.findElement(By.xpath(".//*[@id='topnav_forum']")).click();
		} catch (Exception e){
			Assert.fail("Can't find 'FORUM' link from top navigation menu");
		}

	}
	
	public void communityLink(){
		try{
			driver.findElement(By.xpath(".//*[@id='topnav']/ul/li[7]/a")).click();
		} catch (Exception e){
			Assert.fail("Can't find 'COMMUNITY' link from top navigation menu");
		}

	}
	
	public void helpLink(){
		try{
			driver.findElement(By.xpath(".//*[@id='topnav']/ul/li[9]/a")).click();
		} catch (Exception e){
			Assert.fail("Can't find 'HELP' link from top navigation menu");
		}

	}
	
	public void contactLink(){
		try{
			driver.findElement(By.xpath(".//*[@id='topnav']/ul/li[11]/a")).click();
		} catch (Exception e){
			Assert.fail("Can't find 'CONTACT' link from top navigation menu");
		}

	}
	
	public void loginLink(){
		try{
			driver.findElement(By.xpath(".//*[@id='topnav']/ul/li[15]/a")).click();
		} catch (Exception e){
			Assert.fail("Can't find 'LOGIN' link from top navigation menu");
		}

	}
	
	public void login(String userID, String password){
		loginLink();
		setCredential(userID, password);
		driver.findElement(By.xpath(".//*[@id='username']")).sendKeys(user);
		driver.findElement(By.xpath(".//*[@id='password']")).sendKeys(password);
		driver.findElement(By.xpath(".//*[@id='submit']")).click();
	}
	
	public void logoutLink(){
		try{
			driver.findElement(By.xpath(".//*[@id='topnav']/ul/li[17]/a")).click();
		} catch (Exception e){
			Assert.fail("Can't find 'LOGOUT' link from top navigation menu");
		}

	}
	
	public void loginStatusMessage(){
		//this link will take to the user profile page
		try{
			driver.findElement(By.xpath(".//*[@id='logoxx']/span/a")).click();
		} catch (Exception e){
			Assert.fail("Login status message is not there.");
		}
	}
	
	public void verifyLoggedInStatusMessage(){
		String actualStatusMessage = driver.findElement(By.xpath(".//*[@id='logoxx']/span/a")).getText();
		if(!(actualStatusMessage.equals(loginStatusUserId))){
			Assert.fail("You are expecting \'" + loginStatusUserId + "\' but got " + actualStatusMessage);
		}
	}
	
	public void verifyWelcomeMessage(){
		String actualStatusMessage = driver.findElement(By.xpath(".//*[@id='logoxx']/span/a")).getText();
		if(!(actualStatusMessage.equals(loginStatusWelcomeMessage))){
			Assert.fail("You are expecting \'" + loginStatusWelcomeMessage + "\' but got " + actualStatusMessage);
		}
	}
	
	//left accordion menu ---------------------------------------------------------------------------
	
	//right external site links ---------------------------------------------------------------------
	
	//content section
	
	//footer  .//*[@id='footer']/p
	public void footerText(){
		try{
			driver.findElement(By.xpath(".//*[@id='footer']/p")).isDisplayed();
		} catch (Exception e){
			Assert.fail("Can't find the footer on this page");
		}

	}
	
	//utility methods -------------------------------------------------------------------------------
	public void verifyCurrentURL(String fileName){
		String currentURL = driver.getCurrentUrl();
		if(!(fileName.equalsIgnoreCase(currentURL))){
			Assert.fail("You are expecting " + fileName + " page but actual page is " + currentURL);
		}
	}
	
	public void submitContactForm(String name, String email, String phoneNum, String message){
		//*** deal with pop-ups for negative test
		try{
			driver.findElement(By.xpath(".//*[@id='contactName']")).sendKeys(name);
			driver.findElement(By.xpath(".//*[@id='contactEmail']")).sendKeys(email);
			driver.findElement(By.xpath(".//*[@id='contactPhoneNumber']")).sendKeys(phoneNum);
			driver.findElement(By.xpath(".//*[@id='contactComments']")).sendKeys(message); 
			driver.findElement(By.xpath(".//*[@id='contactSubmit']")).click();
		} catch (Exception e){
			Assert.fail("The contact form could not submitted, please check again, current page is " + driver.getCurrentUrl());
		}
	}

	
	@BeforeTest
	public void beforeTest(){
		chromeSetup();
	}

	@Test
	public void check_top_nav_links() throws InterruptedException{
		System.out.println(driver.getCurrentUrl());
		//Thread.sleep(5000);
		//driver.findElement(By.linkText("GALLERY")).click();
		driver.findElement(By.linkText("GALLERY")).click();
		//gallery.click();
		//Thread.sleep(5000);
		System.out.println(driver.getCurrentUrl());
		homeLink();
		System.out.println(driver.getCurrentUrl());
		loginLink();
		verifyCurrentURL("http://newvisionpress.org/root/login.php");
		login("hkyung", "seaweed");
		
		homeLink();
		verifyLoggedInStatusMessage();
		forumLink();
		verifyCurrentURL("http://newvisionpress.org/root/nvc_forum.php");
		homeLink();
		verifyCurrentURL("http://newvisionpress.org/root/index.php");
		logoutLink();
		verifyCurrentURL("http://newvisionpress.org/root/logout.php");
		logoutLink();  //for refresh
		verifyWelcomeMessage();
		contactLink();
		submitContactForm("Nathan Kyung", "nathan4kyung", "(408)555-5555", "Hello there, I really need to contact a public " +
				"relation personal"); 
		
	}
  @Test(dataProvider = "dp")
  public void f(Integer n, String s) {
  }
  @BeforeMethod
  public void beforeMethod() {
  }


  @DataProvider
  public Object[][] dp() {
    return new Object[][] {
      new Object[] { 1, "a" },
      new Object[] { 2, "b" },
    };
  }
  
	@AfterTest
	public void afterTest(){
		tearDown();
	}
}
