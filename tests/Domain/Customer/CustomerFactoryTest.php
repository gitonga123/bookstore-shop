<?php

namespace Bookstore\Tests\Domain\Customer;

use Bookstore\Domain\Customer\CustomerFactory;
use Bookstore\Domain\Customer\Basic;
// use PHPUnit_Framework_TestCase;

/**
 * Test for CustomerFactory Class
 */
class CustomerFactoryTest extends \PHPUnit_Framework_TestCase
{
	
	public function testFactoryBasic()
	{
		$customer = CustomerFactory::factory(
			'basic', 1, 'han', 'solo', 'han@solo.com'
		);
		$this->assertInstanceOf(
			Basic::class, $customer, 'basic should create a Customer\Basic object.'
		);

		$expectedBasicCustomer = new Basic(1,'han', 'solo', 'han@solo.com');
		$this->assertEquals($customer, $expectedBasicCustomer, 'Customer Object Is not as Expected.');
	}


	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testCreatingWrongTypeOfCustomer()
	{
		$customer = CustomerFactory::factory('deluxe', 1, 'han','solo', 'han@solo.com');
	}
}
?>