<?php
/**
    * This files handles all the autoloading from the Composer code
*/
use Bookstore\Core\Router;
use Bookstore\Core\Request;
use Bookstore\Controllers\AbstractController;
use Bookstore\Core\Config;
use Bookstore\Utils\DependencyInjector;
use Bookstore\Controllers\BookController;

require_once __DIR__.'/vendor/autoload.php';


// $loader = new Twig_Loader_Filesystem(__DIR__.'/src/view');
// $twig = new Twig_Environment($loader);

// //$bookModel = new BookModel(Db::getInstance());
// //$book = $bookModel->getAll(1,3);
// //
// //$params = ['books' => $book, 'currentPage' => 2];
// $saleModel = new SalesModel(Db::getInstance());
// $sales = $saleModel->getByUser(1);

// $params = ['sales' => $sales];

// //echo $twig->loadTemplate('book.twig')->render($params);
// echo $twig->loadTemplate('sales.twig')->render($params);

// $router = new Router();
// $response = $router->route(new Request());
// echo $response;
// $config = new Config();

// $db = $config->get('db');

// $db =  new PDO(
// 			'mysql:host=127.0.0.1;dbname=bookstore',
// 			$dbConfig['user'],
// 			$dbConfig['password']
// 		);
// $loader = new Twig_Loader_Filesystem(__DIR__ . '/../views');
// $view = new Twig_Environment($loader);
// $log = new Logger('bookstore');
// $logFile = $config->get('log');
// $log->pushHandler(new StreamHamdler($logFile, Logger::DEBUG));

// $di = new DependencyInjector();
// $di->set('PDO', $db);
// $di->set('Utils\Config', $config);
// $di->set('Twig_Environment', $view);
// $di->set('Logger', $log);

// $di->set('BookModel', new BookModel($di->get('PDO')));

// Array_change_key_case

$input_array = array("first" => 1, "seCond" => 2);
var_dump(array_change_key_case($input_array, CASE_UPPER));
var_dump(array_change_key_case($input_array, CASE_LOWER));

// Array Chunck // splits array into chunks

$input_array_c = array("a","b","c","d","e");
var_dump(array_chunk($input_array_c, 2));
var_dump(array_chunk($input_array_c, 2, true));

//Array Slice EXTRACT A SLICE OF THE ARRAY
$input_array_s = array("a","b","c","d","e", "f");
var_dump(array_slice($input_array_s, 2));
var_dump(array_slice($input_array_s, -2, 1));
var_dump(array_slice($input_array_s, 0, 3));

//Array Column - Returns the values from a single column in the input array
$records = array(
    array(
        'id' => 2135,
        'first_name' => 'John',
        'last_name' => 'Doe',
    ),
    array(
        'id' => 3245,
        'first_name' => 'Sally',
        'last_name' => 'Smith',
    ),
    array(
        'id' => 5342,
        'first_name' => 'Jane',
        'last_name' => 'Jones',
    ),
    array(
        'id' => 5623,
        'first_name' => 'Peter',
        'last_name' => 'Doe',
    )
);

var_dump(array_column($records, 'first_name'));
var_dump(array_column($records, 'last_name', 'id'));
