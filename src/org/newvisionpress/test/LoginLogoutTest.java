package org.newvisionpress.test;

import junit.framework.Assert;

import org.testng.annotations.Test;
import org.testng.annotations.DataProvider;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.AfterTest;

public class LoginLogoutTest extends NVCwebLib {
	
  
  @Test(dataProvider = "credentials")
  public void loginTest(String userid, String password) {
	  loginLink();
	  login(userid, password);
	  //verifyLoggedInStatusMessage();
	  logoutLink();
  }

  @DataProvider
  public Object[][] credentials() {
    return new Object[][] {
      new Object[] { "hkyung", "seaweed" },
      new Object[] { "jkyung", "seaweed" },
    };
  }
  
  @Test
  //test page access permission as per user
  public void teamPermissionVerify(){
	  //*** TBD, positive/negative/admin
	  

  }
  
  @DataProvider(name = "loginData")	    
  public Object[][] createData1() throws Exception{
  	//provide data for any Test that uses.
      Object[][] retObjArr=getTableArray("resource\\data\\newvisionpress_data.xls", "login_data",  "login_data");
      return(retObjArr);
  }

  @Test (dataProvider = "loginData")
  public void testLoginWithExcelData(String name, String password, String team){
   	//driver.manage().timeouts().implicitlyWait(5, TimeUnit.SECONDS);
  	login(name, password);
  }
  
  @BeforeTest
  public void beforeTest() {
	  setupChrome("http://newvisionpress.org/root/index.php");
  }

  @AfterTest
  public void afterTest() {
	  tearDown();
  }

}
