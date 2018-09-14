<?php 
namespace Bookstore\Domain\Customer;
use Bookstore\Domain\Customer;
use Bookstore\Domain\Person;

/**
 * Basic cutomer
 * Extends the Customer class
 */
class Basic extends Person implements Customer
{
	public function getMonthlyFee() : float {
		return 5.0;
	}

	public function getAmountToBorrow() : int {
		return 3;
	}

	public function getType() : string {
		return "Basic";
	}

	public function pay(float $amount)
    {
        echo "Paying = $amount";
    }

    public function isExtendOfTaxes():bool
    {
        return false;
    }
}
?>