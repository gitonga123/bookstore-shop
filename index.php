<?php

use Bookstore\Domain\Customer;
use Bookstore\Domain\Customer\Basic;
use Bookstore\Domain\Book;
use Bookstore\Utils\Config;

echo "<title>Bookstore</title>";

function autoloader($classname)
{
    $lastSlash = strpos($classname, '\\') + 1;
    $classname = substr($classname, $lastSlash);
    $directory = str_replace('\\', '/', $classname);
    $filename = __DIR__.'/src/'.$directory.".php";
    require_once($filename);
}
spl_autoload_register('autoloader');

$book = new Book(16578901, "River Between", "James Thiongo", 1);
$book1 = ['River between'];


function checkIfValid(Customer $customer, array $books): bool
{
    return $customer->getAmountToBorrow() >= count($books);
}

try {
    $customer1 = new Basic(2, 'John', 'Doe', 'johndoe@mail.com');
} catch (Exception $e) {
    echo "something happened when creating the basic customer: " . $e->getMessage();
}

// $customer1->createBasicCustomer(1);
// $customer1->createBasicCustomer(-1);

//echo $customer1->getId();
//get an instance of the database connection
//improvements comming soon
$config = Config::getInstance()->get('db');
// extension=php_pdo.dll
$db = new PDO(
    'mysql:host=127.0.0.1;dbname=bookstore',
    $config['user'],
    $config['password']
);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

//performing queries PDO
// $rows = $db->query('SELECT * FROM book ORDER BY title');

// $query = <<<SQL
// INSERT INTO book (isbn, title, author, price)
// VALUES ("9788187981954", "Peter Pan", "J. M. Barrie", 2.34)
// SQL;
// $result = $db->exec($query);
// var_dump($result);
// $error = $db->errorInfo();
// var_dump($error);
// Prepared Statement
// $query = 'SELECT * FROm book WHERE author = :author';
// $statement = $db->prepare($query);
// $statement->bindValue('author', 'George Orwell');
// $statement->execute();

// $rows = $statement->fetchAll();
// var_dump($rows);

// $query = <<<SQL
// INSERT INTO book (isbn, title, author, price)
// VALUES (:isbn, :title, :author, :price)
// SQL;
// $statement = $db->prepare($query);
// $params = [
//     'isbn' => '1567839001',
//     'title' => 'Home Alone',
//     'author' => 'Alision Backer',
//     'price' => 9.25
// ];
// $statement->execute($params);
// var_dump($db->lastInsertId());

//Working with transactions
$db->beginTransaction();
try {
    $query = 'INSERT INTO sale (customer_id, date) VALUES (:id, NOW())';
    $statement = $db->prepare($query);
    if (!$statement->execute(['id' => $userId])) {
        throw new Exception($statement->errorInfo()[2]);
    }
    $saleId = $db->lastInsertId();
    $query = 'INSERT INTO sale_book (book_id, sale_id) VALUES(:book, :sale)';
    $statement = $db->prepare($query);
    $statement->bindValue('sale', $saleId);
    foreach ($booksId as $bookId) {
        $statement-bindValue('book', $bookId);
        if (!$statement->execute()) {
            throw new Exception($statement->errorInfo()[2]);
        }
    }
    $db->commit();
} catch (Exception $e) {
      $db->rollBack();
      throw $e;
}
