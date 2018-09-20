<?php

namespace Bookstore\Tests\Domain\Customer;

use Bookstore\Domain\Customer\Basic;
use PHPUnit_Framework_TestCase;

/**
 * This test class tests the basic class under customer.
 * using PHPUnit
 */
class BasicTest extends PHPUnit_Framework_TestCase
{
	private $customer;

	public function setUp()
	{
		$this->customer = new Basic(1, 'hack', 'solo', 'hansolo@solace.com');
	}
	/**
    * @test
    */
	public function testAmountToBorrow()
	{
		//assertion check performed on a value
		$this->assertSame(
			3,
			$this->customer->getAmountToBorrow(),
			'Basic customer should borrow up to 3 books.'
		);
	}

	/**
    * @test
    */
    public function testFail()
    {
    	$this->assertSame(
			4,
			$this->customer->getAmountToBorrow(),
			'Basic customer should borrow up to 3 books.'
		);
    }

    public function testIsExemptOfTaxes()
    {
    	$this->assertFalse(
    		$this->customer->IsExemptOfTaxes(),
    		"Basic customer should be exempt of taxes"
    	);
    }

    public function testGetMonthlyFee()
    {
    	//use assert equal instead
    	$this->assertSame(
    		5,
    		$this->customer->getMonthlyFee(),
    		"Basic customer should pay 5 a month"
    	);
    }
}
