package org.newvisionpress.test;

import org.newvisionpress.test.Elements;
import org.newvisionpress.test.NVCwebLib;
import org.testng.annotations.AfterTest;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

//** Test external NVC web sites and verify sites by external urls */
public class TestExternalLinks extends NVCwebLib {
	
	public String url = "http://newvisionpress.org";
	
	@BeforeTest
	public void setup(){
		setupChrome(url);
	}
	@AfterTest
	public void cleanup(){
		tearDown();
	}

}
