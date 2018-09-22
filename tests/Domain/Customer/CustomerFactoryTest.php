<?php

namespace Bookstore\Tests\Domain\Customer;

use Bookstore\Domain\Customer\CustomerFactory;
use PHPUnit_Framework_TestCase;

/**
 * Test for CustomerFactory Class
 */
class CustomerFactory extends PHPUnit_Framework_TestCase
{
	
	public function testFactoryBasic()
	{
		$customer = CustomerFactory::factory(
			'basic', 1, 'han', 'solo', 'han@solo.com'
		);
		$this->assertInstanceOf(
			Basic::class, $customer, 'basic should create a Customer\Basic object.'
		);
	}
}
?>