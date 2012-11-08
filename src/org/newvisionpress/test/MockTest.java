package org.newvisionpress.test;

import static org.junit.Assert.*;

import java.util.Iterator;

import org.junit.After;
import org.junit.Test;

import static org.mockito.Mockito.*;

public class MockTest {
	
	private final UserManager manager;
	
	public MockTest(){
		this(new UserManager());
	}
	
	MockTest(UserManager manager){
		this.manager = manager;
	}

	@After
	public void tearDown() throws Exception {
	}

	@Test
	public void iterator_will_return_hello_world() {
		@SuppressWarnings("unchecked")
		Iterator<String> i = mock(Iterator.class);
		when(i.next()).thenReturn("hello").thenReturn("world");
		String result = i.next() + " " + i.next();
		assertEquals("hello world", result);
	}

	@Test
	public void with_arguments_Test(){
		@SuppressWarnings("unchecked")
		Comparable<String> c = mock(Comparable.class);
		when(c.compareTo("Test")).thenReturn(1);
		assertEquals(1,  c.compareTo("Test"));
	}
	
	@Test
	public void staticImportTest(){
		UserManager um = mock(UserManager.class);
	}

}
