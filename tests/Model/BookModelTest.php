<?php
/**
 * Created by PhpStorm.
 * User: otbafrica
 * Date: 24/09/18
 * Time: 18:14
 */

namespace Bookstore\Tests\Model;

use Bookstore\Tests\Domain\ModelTestCase;
use Bookstore\Models\BookModel;

class BookModelTest extends ModelTestCase
{
    protected $tables = ['borrowed_books', 'customer', 'book'];
    protected $model;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->model = new BookModel($this->db);
    }

    /***
     * @expectedException \Bookstore\Exceptions\DbException
     */
    public function testBorrowNotFound()
    {
        $book = $this->buildBook(['id' => 123]);
        $this->model->borrow($book, 123);
    }

    /**
     * @expected Exception \Bookstore\Exceptions\DbException
     */
    public function testBorrowCustomerNotFound()
    {
        $book = $this->buildBook(['id' => 123]);
        $this->addBook(['id' => 123]);

       $this->model->borrow($book, 123);
    }

    public function testBorrow()
    {
        $book = $this->buildBook(['id' => 123, 'stock' => 12]);
        $this->addBook(['id' => 123, 'stock' => 12]);
        $this->addCustomer(['id' => 123]);

        $this->model->borrow($book, 123);
    }
}