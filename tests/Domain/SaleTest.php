<?php
/**
 * Created by PhpStorm.
 * User: otbafrica
 * Date: 24/09/18
 * Time: 18:41
 */

namespace Bookstore\Tests\Domain;
use Bookstore\Domain\TDD;



class SaleTest extends \PHPUnit_Framework_TestCase
{
    public function testCanCreate()
    {
        $sale = new TDD();
    }

    public function testWhenCreatedBookListIsEmpty()
    {
        $sale = new TDD();

        $this->assertEmpty($sale->getBooks());
    }

    public function testWhenAddingABookIGetOneBook()
    {
        $sale = new TDD();
        $sale->addBook(123);

        $this->assertSame(
            $sale->getBooks(),
            [123 => 1]
        );
    }
}