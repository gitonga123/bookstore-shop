<?php
namespace Bookstore\Core;

use PDO;

/**
 * Establish a database connection using PHP Data Objects
 * Implements the singleton patterns and creates PDO connection
 */
class Database
{
	private static $instance;

	private static function connect(): PDO 
	{
		$dbConfig = Config::getInstance()->get('db');
		return new PDO(
			'mysql:host=127.0.0.1;dbname=bookstore',
			$dbConfig['user'],
			$dbConfig['password']
		);
	}

	public static function getInstance()
	{
		if (self::$instance == null) {
			self::$instance = self::connect();
		}
		return self::$instance;
	}
}
?>