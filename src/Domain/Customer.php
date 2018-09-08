<?php 

namespace Bookstore\Domain;
/**
 * Books
 */
class Customer extends Person
{
	private $id;
	private $email;
	private static $lastId = 0;
	function __construct ($id, string $firstname, string $surname, string $email)
	{
		parent::__construct($firstname, $surname);
		if ($id == null) {
			$this->id = ++self::$lastId;
		} else {
			$this->id = $id;
			if ($id > self::$lastId) {
				self::$lastId = $id;
			}
		}
		$this->email = $email;
	}
	
	public function getId(): int {
		return $this->id;
	}

	public static function getLastId (): int {
		return self::$lastId;
	}
	public function getEmail(): string {
		return $this->email;
	}

	public function setEmail(string $email)
	{
		$this->email = $email;
	}
}

?>