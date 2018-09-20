<?php

namespace Bookstore\Tests\Domain\Customer;

use Bookstore\Domain\Customer\Basic;
use PHPUnit_Framework_Testcase;

/**
 * This test class tests the basic class under customer.
 * using PHPUnit
 */
class BasicTest extends PHPUnit_Framework_Testcase
{
	/**
    * @test
    */
	public function testAmountToBorrow()
	{
		$customer = new Basic(1, 'hack', 'solo', 'hansolo@solace.com');
		//assertion check performed on a value
		$this->assertSame(
			3,
			$customer->getAmountToBorrow(),
			'Basic customer should borrow up to 3 books.'
		);
	}

	/**
    * @test
    */
    public function testFail()
    {
    	$customer = new Basic(1, 'hack', 'solo', 'hansolo@solace.com');
    	$this->assertSame(
			4,
			$customer->getAmountToBorrow(),
			'Basic customer should borrow up to 3 books.'
		);
    }
}
