<?php

namespace Bookstore\Controllers;

use Bookstore\Core\Config;
use Bookstore\Core\Db;
use Bookstore\Core\Request;
use Monolog\Log;
use Twig_Environment;
use Twig_Loader_Filesystem;
use Monolog\Handler\StreamHandler;

/**
 * AbstractControllers the parent to all controllers
 */
abstract class AbstractControllers
{
	protected $request;
	protected $db;
	protected $config;
	protected $view;
	protected $log;
	public function __construct(Request $request)
	{
		$this->request = $request;
		$this->db = Db::getInstance();

		$loader = new Twig_Loader_Filesystem(
			__DIR__ . '/../../views';
		);

		$this->view = new Twig_Environment($loader);

		$this->log = new Logger('bookstore');
		$logFile = $this->config('log');
		$this->log->pushHandler(
			new StramHandler($logFile, Logger::DEBUG);
		);
	}

	public function setCustomerId(int $customerId)
	{
		$this->customerId = $customerId;
	}

	protected function render(string $template, array $params): string
	{
		return $this->view->loadTemplate($template)->render($params);
	}
}
?>