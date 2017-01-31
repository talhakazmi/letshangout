<?php

class MoviesTest extends WebTestCase
{
	/*
         * Test for checking movies page loaded
         */
        public function testIndex()
	{
		$this->open('movies');
		$this->assertTextPresent('Karachi');
		$this->assertTextPresent('NOW SHOWING');
	}
	
        /*
         * Test for check change location text present
         */
        public function testChangeLocation()
	{
		$this->open('movies');
		$this->assertTextPresent('change location');
	}
        
        /*
         * Test for checking slider loaded 
         */
        public function testSlider()
	{
		$this->open('movies');
		$this->assertTextPresent('Karachi');
		$this->assertElementPresent('class=icon-prev');
	}
        
        /*
         * Test for checking Grid is loaded
         */
        public function testGrid()
	{
		$this->open('movies');
		$this->assertTextPresent('Karachi');
		$this->assertElementPresent('class=thumbnails');
		$this->assertElementPresent('class=thumbnail');
	}
        
        /*
         * Test for checking coming soon tab click loads content
         */
        public function testComingSoonTab()
	{
		$this->open('movies');
		$this->assertTextPresent('Karachi');
		if($this->isTextPresent('COMING SOON'))
			$this->click('link=COMING SOON');
                
                $this->mouseUpRightAt('class=thumbnail');
                $this->assertTextPresent('Watch Trailer');
                
	}
        
        /*
         * Test for checking archive tab click loads content
         */
        public function testArchiveTab()
	{
		$this->open('movies');
		$this->assertTextPresent('Karachi');
		if($this->isTextPresent('ARCHIVE'))
			$this->click('link=ARCHIVE');
                
                $this->mouseUpRightAt('class=thumbnail');
                $this->assertTextPresent('Watch Trailer');
                
	}
/*
	public function testContact()
	{
		$this->open('site/contact');
		$this->assertTextPresent('Contact Us');
		$this->assertElementPresent('name=ContactForm[name]');

		$this->type('name=ContactForm[name]','tester');
		$this->type('name=ContactForm[email]','tester@example.com');
		$this->type('name=ContactForm[subject]','test subject');
		$this->click("//input[@value='Submit']");
		$this->waitForTextPresent('Body cannot be blank.');
	}

	public function testLoginLogout()
	{
		$this->open('');
		// ensure the user is logged out
		if($this->isTextPresent('Logout'))
			$this->clickAndWait('link=Logout (demo)');

		// test login process, including validation
		$this->clickAndWait('link=Login');
		$this->assertElementPresent('name=LoginForm[username]');
		$this->type('name=LoginForm[username]','demo');
		$this->click("//input[@value='Login']");
		$this->waitForTextPresent('Password cannot be blank.');
		$this->type('name=LoginForm[password]','demo');
		$this->clickAndWait("//input[@value='Login']");
		$this->assertTextNotPresent('Password cannot be blank.');
		$this->assertTextPresent('Logout');

		// test logout process
		$this->assertTextNotPresent('Login');
		$this->clickAndWait('link=Logout (demo)');
		$this->assertTextPresent('Login');
	}
*/
}
