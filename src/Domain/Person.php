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
    private  static $lastId = 0;
    protected $id;
    protected $email;

    public function __construct(int $id, string $firstname, string $surname, string $email)
    {
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
        if (empty($id)) {
            $this->id = ++self::$lastId;
        } else {
            $this->id = $id;
            if ($id > self::$lastId) {
                self::$lastId = $id;
            }
        }
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
