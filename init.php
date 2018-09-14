<?php

use Bookstore\Domain\Customer;
use Bookstore\Domain\Customer\Basic;
use Bookstore\Domain\Customer\Premium;
use Bookstore\Domain\Book;
use Bookstore\Utils\Config;

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
$customer1 = new Basic(5, 'John', 'Doe', 'johndoe@mail.com');
$customer2 = new Premium(7, 'James', 'Bond', 'james@bond.com');
 var_dump($customer1 instanceof Basic);
