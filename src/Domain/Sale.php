<?php
/**
 * Created by PhpStorm.
 * User: otbafrica
 * Date: 14/09/18
 * Time: 11:42
 */

namespace Bookstore\Domain;

class Sale
{
    private $id;
    private $customer_id;
    private $books;
    private $date;

    /**
     * @return mixed
     */
    public function getCustomerId(): int
    {
        return $this->customer_id;
    }

    public function setId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $customer_id
     */
    public function setCustomerId(string $customer_id)
    {
        $this->customer_id = $customer_id;
    }

    /**
     * @return mixed
     */
    public function getBooks(): array
    {
        return $this->books;
    }

    /**
     * @param mixed $books
     */
    public function setBooks(array $books)
    {
        $this->books = $books;
    }

    /**
     * @return mixed
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate(string $date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function addBook(int $bookId, int $amount = 1)
    {
        if (!isset($this->books[$bookId])) {
            $this->books[$bookId] = 0;
        }
        $this->books[$bookId] += $amount;
    }
}
