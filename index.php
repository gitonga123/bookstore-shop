<?php
/**
    * This files handles all the autoloading from the Composer code
*/
require_once __DIR__.'/vendor/autoload.php';
use Bookstore\Models\SalesModel;
use Bookstore\Core\Db;

$loader = new Twig_Loader_Filesystem(__DIR__.'/src/view');
$twig = new Twig_Environment($loader);

//$bookModel = new BookModel(Db::getInstance());
//$book = $bookModel->getAll(1,3);
//
//$params = ['books' => $book, 'currentPage' => 2];
$saleModel = new SalesModel(Db::getInstance());
$sales = $saleModel->getByUser(1);

$params = ['sales' => $sales];

//echo $twig->loadTemplate('book.twig')->render($params);
echo $twig->loadTemplate('sales.twig')->render($params);
