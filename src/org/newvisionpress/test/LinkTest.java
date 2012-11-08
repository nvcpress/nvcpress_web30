package org.newvisionpress.test;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

import org.newvisionpress.test.NVCwebLib;

public class LinkTest extends NVCwebLib {
	
	@Test
	public void testTest(){
		System.out.println("******************* hello there!***************");
	}
	@Test
	public void verifyURLTest(){
		verifyURL("http://www.newvisionpress.org");
	}
	

  //setup and clean up  ------------------------------------------------------------------------------------
  @Before
  public void beforeTest() {
	  setupChrome("http://newvisionpress.org/sandbox_test/public_html/public/home.php");
  }

  @After
  public void afterTest() {
	  tearDown();
  }

}
