<?php
namespace Bookstore\Domain;
use Bookstore\Utils\Unique;

/**
 * person's class
 * defines the properties and methods of a person in the system
 */
class Person
{
    use Unique;
    protected $firstname;
    protected $surname;
    protected $id;
    protected $email;

    public function __construct(int $id, string $firstname, string $surname, string $email)
    {
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
        $this->setId($id);
    }

    public function getFirstName() : string
    {
        return $this->firstname;
    }

    public function getSurname() : string
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public static function getLastId(): int
    {
        return self::$lastId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
