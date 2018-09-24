<?php

namespace Bookstore\Tests;

use InvalidArgumentException;

/**
* This class tries to figure out if the classname
* is part of the Bookstore namespace or not.
*/

abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase
{
	protected function mock(string $classname)
	{
		if (strpos($classname, '\\') !== 0) {
			$classname = '\\' . $classname;
		}

		if (!class_exists($classname)) {
			$classname = '\Bookstore\\' . trim($classname, '\\');

			if (!class_exists($classname)) {
				throw new InvalidArgumentException("Class $classname not found", 1);
			}
		}

		return $this->getMockBuilder($classname)->disableOriginalConstructor()
		->getMock();
	}
}
?>