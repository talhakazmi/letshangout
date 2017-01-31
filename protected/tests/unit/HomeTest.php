<?php

class HomeTest extends WebTestCase
{
	/*
         * Test for checking home page loaded
         */
        public function testIndex()
	{
		$this->open('');
		$this->assertTextPresent('HOW IT WORKS');
	}
        
        /*
         * Test for check login option available on home page
         */
        public function testLogin()
	{
		$this->open('');
		$this->assertTextPresent('Log in');
	}
        
        /*
         * Test for check signup option available for home page
         */
        public function testSignup()
	{
		$this->open('');
		$this->assertTextPresent('Sign up');
	}
        
        /*
         * Test for check location karachi detected
         */
        public function testCorrectLocation()
	{
		$this->open('');
		$this->assertTextPresent('Karachi');
	}
        
        /*
         * Test for check change location option availab eon screen
         */
        public function testChangeLocation()
	{
		$this->open('');
		$this->assertTextPresent('Change Location');
	}
        
        /*
         * Test for check get early access available on home page
         */
        public function testGetEarlyAccess()
	{
		$this->open('');
		$this->assertElementPresent('name=email');
		$this->assertElementPresent('class=get-notified-btn');
	}
        
        /*
         * Test for check link to blog available
         */
        public function testBlog()
	{
		$this->open('');
		$this->assertTextPresent('Blog');
	}
        
        /*
         * Test for check link to movies available and in working condition
         */
        public function testMoviesLink()
	{
		$this->open('');
		if($this->isTextPresent('Movies'))
			$this->clickAndWait('link=Movies');
                
                $this->assertTextPresent('NOW SHOWING');
	}
        
        /*
         * Test for check link to event available
         */
        public function testEventLink()
	{
		$this->open('');
		$this->assertTextPresent('Events');
	}
        
        /*
         * Test for check link to plan hangout available 
         */
        public function testPlanLink()
	{
		$this->open('');
		$this->assertTextPresent('Plan Hangout');
	}
        
        /*
         * Test for check how it works sort of tutorial available as per design
         */
        public function testHowItWorks()
	{
		$this->open('');
		$this->assertTextPresent('HOW IT WORKS');
		$this->assertTextPresent('Create Hangout Plan');
		$this->assertTextPresent('Invite Friends');
		$this->assertTextPresent('Vote on the idea or provide suggestion');
		$this->assertTextPresent('Confirm');
		$this->assertTextPresent('Have Fun!');
	}

}
