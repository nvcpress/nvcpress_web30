package org.newvisionpress.test;

import org.junit.Test;
import static org.mockito.Mockito.*;
import org.mockito.invocation.InvocationOnMock;
import org.mockito.stubbing.Answer;

import static org.junit.Assert.*;

public class UserServerTest {
	@Test
	public void testThenReturn() throws Exception{
		UserManager manager = mock(UserManager.class);
		when(manager.getUserCount()).thenReturn(50);
		UserService userService = new UserService(manager);
		assertEquals(50, userService.getUserCount());
	}
	@Test
	public void testThenThrow() throws Exception{
		UserManager manager = mock(UserManager.class);
		when(manager.getUserCount()).thenThrow(new RuntimeException());
		UserService userService = new UserService(manager);
		assertEquals(-1, userService.getUserCount());
	}
	
	@SuppressWarnings("rawtypes")
	@Test
	public void testThenAnswer() throws Exception{
		UserManager manager = mock(UserManager.class);
		when(manager.getUserCount()).thenAnswer(new Answer() {
			public int count = 0;
			
			public Object answer(InvocationOnMock invocationOnMock) throws Throwable{
				return ++count;
			}
		});
		
		UserService userService = new UserService(manager);
		assertEquals(1, userService.getUserCount());
		assertEquals(2, userService.getUserCount());
		assertEquals(3, userService.getUserCount());
	}
	
	@Test
	public void testSaveUser() throws Exception{
		UserManager manager = mock(UserManager.class);
		UserService userService = new UserService(manager);
		userService.saveUser("Jay");
		verify(manager).save("Jay");
		verify(manager, times(1)).save("Jay");
	}
	
}
