<?php
/**
 * Created by PhpStorm.
 * User: otbafrica
 * Date: 24/09/18
 * Time: 18:08
 */

namespace Bookstore\Tests\Domain;

use Bookstore\Core\Config;
use Bookstore\Domain\Book;
use Bookstore\Tests\AbstractTestCase;
use PDO;


class ModelTestCase
{
    protected $db;
    protected $tables = [];

    public function setUp()
    {
        $config = new Config();

        $dbConfig = $config->get('db');
        $this->db = new PDO(
            'mysql:host=127.0.0.1;dbname=bookstore',
            $dbConfig['user'],
            $dbConfig['password']
        );
        $this->db->beginTransaction();
        $this->cleanAllTables();
    }

    public function tearDown()
    {
        $this->db->rollback();
    }

    protected function cleanAllTables()
    {
        foreach ($this->tables as $table) {
            $this->db->exec('delete from $table');
        }
    }

    public function buildBook(array $properties): Book
    {
        $book = new Book();
        $reflectionClass = new \ReflectionClass(Book::class);
        foreach ($properties as $key => $value) {
            $property = $reflectionClass->getProperty($key);
            $property->setAccessible(true);
            $property->setValue($book, $value);
        }

        return $book;
    }

    public function addBook(array $params)
    {
        $default = ['id' => null, 'isbn' => 'isbn', 'author' => 'author', 'stock' => 1, 'price' => 10.0];
        $params = array_merge($default, $params);

        $query = "
         INSERT INTO book(id, isbn, title, author, stock, price)
         values(:id, :isbn, :title, :author, :stock, :price)
         SQL";
         $this->db->prepare($query)->execute($params);
    }
}