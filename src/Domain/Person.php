<?php 
namespace Bookstore\Domain;
/**
 * person's class
 * defines the properties and methods of a person in the system
 */
class Person
{
	protected $firstname;
	protected $surname;
	public function __construct(string $firstname, string $surname)
	{
		$this->firstname = $firstname;
		$this->surname = $surname;	
	}

	public function getFirstName() : string {
		return $this->firstname;
	}

	public function getSurname() : string {
		return $this->surname;
	}

	public function setFirstName(string $firstname)
	{
		return $this->firstname;
	}

	public function setSurname(string $surname)
	{
		return $this->surname;
	}
}

?>