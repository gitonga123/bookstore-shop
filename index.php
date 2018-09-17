<?php
/**
    * This files handles all the autoloading from the Composer code
*/
require_once __DIR__.'/vendor/autoload.php';
use Bookstore\Models\BookModel;
use Bookstore\Core\Db;

$loader = new Twig_Loader_Filesystem(__DIR__.'/src/view');
$twig = new Twig_Environment($loader);

$bookModel = new BookModel(Db::getInstance());
$book = $bookModel->getAll(1,3);

$params = ['books' => $book, 'currentPage' => 2];

//echo $twig->loadTemplate('book.twig')->render($params);
echo $twig->loadTemplate('books.twig')->render($params);
