<?php 

namespace Bookstore\Domain;
/**
 * Books
 */
class Customer 
{
	private $id;
	private $firstname;
	private $surname;
	private $email;
	private static $lastId = 0;
	function __construct ($id, string $firstname, string $surname, string $email)
	{
		if ($id == null) {
			$this->id = ++self::$lastId;
		} else {
			$this->id = $id;
			if ($id > self::$lastId) {
				self::$lastId = $id;
			}
		}
		$this->firstname = $firstname;
		$this->surname = $surname;
		$this->email = $email;
	}
	
	public function getId(): int {
		return $this->id;
	}

	public static function getLastId (): int {
		return self::$lastId;
	}

	public function getFirstname(): string {
		return $this->firstname;
	}

	public function getSurname(): string {
		return $this->surname;
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