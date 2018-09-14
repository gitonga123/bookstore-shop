<?php
namespace Bookstore\Domain;

/**
 * Books
 */
class Book
{
    private $id;
    private $isbn;
    private $title;
    private $author;
    private $stock;
    private $price;

    public function getId(): int
    {
        return $this->isbn;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getCopy(): bool
    {
        if ($this->stock < 1) {
             return false;
        } else {
            $this->stock--;
            return true;
        }
    }

    public function addCopy()
    {
        $this->stock++;
    }
}
