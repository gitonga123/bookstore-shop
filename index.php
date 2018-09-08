<?php

use Bookstore\Domain\customer;
use Bookstore\Domain\Book;
// require_once __DIR__.'/Book.php';
// require_once __DIR__.'/Customer.php';

function autoloader($classname)
{
	$lastSlash = strpos($classname, '\\') + 1;
	$classname = substr($classname, $lastSlash);
	$directory = str_replace('\\', '/', $classname);
	$filename = __DIR__.'/src/'.$directory.".php";

	require_once($filename);
}
spl_autoload_register('autoloader');
$book = new Book(16578901,"River Between", "James Thiongo", 1);
$customer = new Customer(1, "James", "Karuku", "karuku@gmail.com");
$customer1 = new Customer(3, 'John', 'Doe', 'johndoe@mail.com');
$customer2 = new Customer(null, 'Mary', 'Poppins', 'mp@mail.com');
$customer3 = new Customer(7, 'James', 'Bond', '007@mail.com');
$book->setTitle("1994");
$book->setAuthor("George Orwell");
$book->addcopy();
$book->setIsbn(8281);

if ($book->getCopy()) {
	echo "Here, Your copy";
} else {
	echo "I'm afraid that book is not available";
}

echo $customer::getLastId();
echo $customer1::getLastId();
echo $customer2::getLastId();
echo $customer3::getLastId();

?>