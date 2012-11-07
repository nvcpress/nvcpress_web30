package org.newvisionpress.test;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.testng.annotations.Test;

public class TestTest extends NVCwebLib{
	WebDriver driver;
	@Test
	public void test(){
		//System.setProperty("webdriver.chrome.driver", "C:\\data\\programming\\selenium_chrome_driver\\chromedriver.exe");
		driver = new FirefoxDriver();
		driver.get("http://newvisionpress.org");
		driver.findElement(By.id(Elements.contactId)).click();
		driver.findElement(By.id(Elements.nameId)).sendKeys("Jay");
	}
}

