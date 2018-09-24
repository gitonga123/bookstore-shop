<?php
/**
 * Created by PhpStorm.
 * User: otbafrica
 * Date: 24/09/18
 * Time: 18:43
 */

namespace Bookstore\Domain;


class TDD
{
    private $books = [];
    public function getBooks():array
    {
        return $this->books;
    }

    public function addBook(int $bookId)
    {
        $this->books[123] = 1;
    }
}