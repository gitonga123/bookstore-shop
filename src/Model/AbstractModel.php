<?php

namespace Bookstore\Models;

use PDO;

/**
 * All Models to extend this class.
 * Class contain a $db protected proprty that will be set on the constructor.
 * 
 */

abstract class AbstractModel
{
	private $db;

	public function __constructor(PDO $db)
	{
		$this->db = $db;
	}
}
?>