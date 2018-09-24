<?php

namespace Bookstore\Tests;

use Bookstore\Core\Config;
use Bookstore\Utils\DependencyInjector;
use Monolog\Logger;
use Twig_Environment;
use PDO;

abstract class ControllerTestCase extends AbstractTestCase
{
	protected $di;

	public function setUp()
	{
		$this->di = new DependencyInjector();
		$this->di->set('PDO', $this->mock(PDO::class));
		$this->di->set('Utills\Config', $this->mock(Config::class));
		$this->di->set(
			'Twig_Environment',
			$this->mock(Twig_Environment::class)
		);
		$this->di->set('Logger', $this->mock(Logger::class));
	}
}
?>