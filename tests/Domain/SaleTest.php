<?php

namespace Bookstore\Tests\Domain\Customer;

use Bookstore\Domain\Sale;
// use PHPUnit_Framework_TestCase;

/**
 * Sale class test
 */
class SaleTest extends \PHPUnit_Framework_TestCase
{
	
	public function testNewSaleHasNoBooks()
	{
		$sale = new Sale();

		$this->assertEmpty($sale->getBooks(), "When new, Sale should have no books");
	}

	public function testAddNewBook()
	{
		$sale = new Sale();
		$sale->addBook(123);

		$this->assertCount(1, $sale->getBooks(), "Number of books not valid."),
		$this->assertArrayHasKey(123, $sale->getBooks(), 'Book id could not be found in array');
		$this->assertSame($sale->getBooks()[123], 1, "when not specified, amount of books is 1");
	}
}