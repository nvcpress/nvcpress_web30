package org.newvisionpress.test;

import static com.eclipsesource.restfuse.Assert.assertOk;

import org.junit.Rule;
import org.junit.runner.RunWith;

import com.eclipsesource.restfuse.Destination;
import com.eclipsesource.restfuse.HttpJUnitRunner;
import com.eclipsesource.restfuse.Method;
import com.eclipsesource.restfuse.Response;
import com.eclipsesource.restfuse.annotation.Context;
import com.eclipsesource.restfuse.annotation.HttpTest;


public class RestFuseTest {



	@RunWith( HttpJUnitRunner.class )
	public class SimpleHttpTest {
	  
	  @Rule
	  public Destination restfuse = new Destination( "http://newvisionpress.org" );
	  
	  @Context
	  private Response response;
	  
	  @HttpTest( method = Method.GET, path = "/" ) 
	  public void checkRestfuseOnlineStatus() {
	    assertOk( response );
	  }
	  
	}
}
