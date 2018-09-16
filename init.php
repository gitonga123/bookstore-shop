<?php

use Bookstore\Domain\Customer;
use Bookstore\Domain\Customer\Basic;
use Bookstore\Domain\Customer\Premium;
use Bookstore\Domain\Book;
use Bookstore\Utils\Config;
use Bookstore\Domain\Payer;
use Bookstore\Domain\Person;
use Bookstore\Exceptions\InvalidIdException;
use Bookstore\Domain\Tax;

function autoloader($classname)
{
    $lastSlash = strpos($classname, '\\') + 1;
    $classname = substr($classname, $lastSlash);
    $directory = str_replace('\\', '/', $classname);
    $filename = __DIR__.'/src/'.$directory.".php";
    require_once($filename);
}
spl_autoload_register('autoloader');
//
//$book = new Book(16578901, "River Between", "James Thiongo", 1);
//$book1 = ['River between'];
//
//
//function checkIfValid(Customer $customer, array $books): bool
//{
//    return $customer->getAmountToBorrow() >= count($books);
//}
//$customer1 = new Basic(5, 'John', 'Doe', 'johndoe@mail.com');
//$customer2 = new Premium(7, 'James', 'Bond', 'james@bond.com');
//var_dump($customer1 instanceof Basic);
//var_dump($customer1 instanceof Premium);
//var_dump($customer2 instanceof Premium);
//var_dump($customer1 instanceof Customer);
//var_dump($customer2 instanceof Customer);
//var_dump($customer1 instanceof Payer);
//var_dump($customer1 instanceof Person);
//var_dump($customer1::getLastId());
//var_dump($customer2::getLastId());
$customer = Customer\CustomerFactory::factory('basic',2,'Mary', 'Hawkins', 'mary@hostgater.com');
$customer1 = Customer\CustomerFactory::factory('premium',2,'Mary', 'Hawkins', 'mary@hostgater.com');

var_dump($customer->getType());
var_dump($customer1->getType());

//Anonymous function/ lambda functions
$addTaxes = function(array &$book, $index, $percentage ) {
	$book['price'] += round($percentage * $book['price'], 2);
};

$books = [
    ['title' => '1984', 'price' => 8.15],
    ['title' => 'Don Quijote', 'price' => 12.00],
    ['title' => 'Odyssey', 'price' => 3.55]
];

// foreach ($books as $index => $book) {
// 	$addTaxes($book, $index, 0.16);
// }
array_walk($books, ['\Bookstore\Domain\Tax', 'add'], 0.16);

array_walk($books, [new \Bookstore\Domain\Tax(), 'addTaxes'], 0.16);
echo "<pre>";
	var_dump($books);
echo "</pre>";