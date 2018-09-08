<?php
namespace Bookstore\Domain\Customer;
use Bookstore\Domain\Customer;

/**
 * Preimum class defines customer with premium attributes
 * extends the customer class
 */
class Premium extends Customer
{
	public function getMonthlyFee(): float {
		return 10.0;
	}

	public function getAmountToBorrow() : int {
		return 10;
	}

	public function getType(): string {
		return 'Premium';
	}
}
?>