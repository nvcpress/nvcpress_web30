package org.newvisionpress.test;

import java.net.MalformedURLException;
import java.net.URL;

import org.openqa.selenium.Platform;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.remote.DesiredCapabilities;
import org.openqa.selenium.remote.RemoteWebDriver;
import org.testng.Assert;
import org.testng.annotations.Test;
import org.testng.annotations.DataProvider;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.AfterTest;

public class TestSeleniumBook extends NVCwebLib {
	
	WebDriver driver;
	
	@BeforeTest
	public void setUp() throws MalformedURLException{
		System.setProperty("webdriver.chrome.driver", "C:\\data\\programming\\selenium_chrome_driver\\chromedriver.exe");
		DesiredCapabilities capability = DesiredCapabilities.chrome();
		capability.setBrowserName("chrome");
		Platform platForm = null;
		capability.setPlatform(platForm.WINDOWS);
		driver = new RemoteWebDriver(new URL("http://localhost:4444/wd/hub"), capability);
		driver.get("http://yahoo.com");
	}
	@Test
	public void testSeup() throws MalformedURLException{
		setUp();
	}

}
