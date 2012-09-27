<?php
/**
 * @package	    Joomla.UnitTest
 * @subpackage  Version
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license	    GNU General Public License version 2 or later; see LICENSE
 */

/**
 * Test class for JVersion.
 * Generated by PHPUnit on 2012-06-10 at 15:05:46.
 */
class JVersionTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var JVersion
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = new JVersion;
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
	}

	/**
	 * Tests the isCompatible method
	 *
	 * @return  void
	 *
	 * @since   3.0
	 *
	 * @covers  JVersion::isCompatible
	 */
	public function testIsCompatible()
	{
		$this->assertThat(
			$this->object->isCompatible('2.5'),
			$this->isTrue(),
			'Version 2.5 code should be compatible with 3.0.'
		);
	}

	/**
	 * Tests the getHelpVersion method
	 *
	 * @return  void
	 *
	 * @since   3.0
	 *
	 * @covers  JVersion::getHelpVersion
	 */
	public function testGetHelpVersion()
	{
		$this->assertThat(
			$this->object->getHelpVersion(),
			$this->isType('string'),
			'getHelpVersion should return a string with the version.'
		);
	}

	/**
	 * Tests the getShortVersion method
	 *
	 * @return  void
	 *
	 * @since   3.0
	 *
	 * @covers  JVersion::getShortVersion
	 */
	public function testGetShortVersion()
	{
		$this->assertThat(
			$this->object->getShortVersion(),
			$this->isType('string'),
			'getShortVersion should return a string with the version.'
		);
	}

	/**
	 * Tests the getLongVersion method
	 *
	 * @return  void
	 *
	 * @since   3.0
	 *
	 * @covers  JVersion::getLongVersion
	 */
	public function testGetLongVersion()
	{
		$this->assertThat(
			$this->object->getLongVersion(),
			$this->isType('string'),
			'getLongVersion should return a string with the full version information.'
		);
	}

	/**
	 * Tests the getUserAgent method for a mask not containing the Mozilla version string
	 *
	 * @return  void
	 *
	 * @since   3.0
	 *
	 * @covers  JVersion::getUserAgent
	 */
	public function testGetUserAgent_maskFalse()
	{
		$this->assertNotContains(
			'Mozilla/5.0 ',
			$this->object->getUserAgent(null, false, true),
			'getUserAgent should return a string with the following information:Component=Framework+Mask different to Mozilla 5.0+Version'
		);
	}

	/**
	 * Tests the getUserAgent method for a mask containing the Mozilla version string
	 *
	 * @return  void
	 *
	 * @since   3.0
	 *
	 * @covers  JVersion::getUserAgent
	 */
	public function testGetUserAgent_maskTrue()
	{
		$this->assertContains(
			'Mozilla/5.0 ',
			$this->object->getUserAgent(null, true, true),
			'getUserAgent should return a string with the following information:Component=Framework+Mask=Mozilla 5.0+Version'
		);
	}

	/**
	 * Tests the getUserAgent method for a null component string
	 *
	 * @return  void
	 *
	 * @since   3.0
	 *
	 * @covers  JVersion::getUserAgent
	 */
	public function testGetUserAgent_ComponentNull()
	{
		$this->assertThat(
			$this->object->getUserAgent(null, false, true),
			$this->stringContains('Framework'),
			'getUserAgent should return a string with the following information:Component=Framework+Mask different to Mozilla 5.0+Version'
		);
	}

	/**
	 * Tests the getUserAgent method for a component string matching the specified option
	 *
	 * @return  void
	 *
	 * @since   3.0
	 *
	 * @covers  JVersion::getUserAgent
	 */
	public function testGetUserAgent_ComponentNotNull()
	{
		$this->assertThat(
			$this->object->getUserAgent('Component_test', false, true),
			$this->stringContains('Component_test'),
			'getUserAgent should return a string with the following information:Component=Component_Test+Mask different to Mozilla 5.0+Version'
		);
	}
}