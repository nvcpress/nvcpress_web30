package org.newvisionpress.test;

import org.testng.annotations.Test;
import org.testng.annotations.DataProvider;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.AfterTest;

public class SubmitContactForm extends NVCwebLib {
	
	
  @Test(dataProvider = "dp")
  public void submitContactForm(String name, String email, String phone, String message) {
	  contactLink();
	  enterNameContactForm(name);
	  enterEmailContactForm(email);
	  enterPhoneContactForm(phone);
	  enterMessageContactForm(message);
	  submitContactForm();
  }

  @DataProvider
  public Object[][] dp() {
    return new Object[][] {
      new Object[] { "Heedon Kyung", "heedonkyung@gmail.com", "(408)555-5555", "Hello, this is Heedon" },
      new Object[] { "Nathan Kyung", "nathan4kyung@gmail.com", "(408)888-8888", "Hello, this is Nathan"  },
    };
  }
  
  @BeforeTest
  public void beforeTest() {
	  //chromeSetup("http://newvisionpress.org/root/index.php");
  }

  @AfterTest
  public void afterTest() {
	  tearDown();
  }



@DataProvider(name = "contactData")	    
public Object[][] createData2() throws Exception{
	//provide data for any Test that uses.
    Object[][] retObjArr=getTableArray("resource\\data\\newvisionpress_data.xls", "contact_data", "contact_data");
    return(retObjArr);
}

@Test (dataProvider = "contactData")
public void testContactFormWithExcelData2(String name, String email, String phone, String message){
 	//driver.manage().timeouts().implicitlyWait(5, TimeUnit.SECONDS);
	contactLink();
	enterNameContactForm(name);
	enterEmailContactForm(email);
	enterPhoneContactForm(phone);
	enterMessageContactForm(message);
	submitContactForm();

}

}//end class