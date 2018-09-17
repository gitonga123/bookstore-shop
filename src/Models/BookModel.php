<?php

namespace Bookstore\Models;

use Bookstore\Domain\Book;
use Bookstore\Exceptions\DbException;
use Bookstore\Exceptions\NotFoundExceptions;
use PDO;

/**
 * The Customer Model.
 * creates and returns an instance of the customer
 */
class BookModel extends AbstractModel
{
    const CLASSNAME = '\Bookstore\Domain\Book';

    public function get(int $bookId): Book
    {
        $query = 'SELECT * FROM book WHERE id = :id';
        $sth = $this->db->prepare($query);
        $sth->execute(['id' => $bookId]);

        $books = $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);

        if (empty($books)) {
            throw new NotFoundExceptions();
        }
        return $books[0];
    }

    public function getAll(int $page, int $pageLength): array
    {
        $start = $pageLength * ($page - 1);

        $query = 'SELECT * FROM book LIMIT :page, :length';
        $sth = $this->db->prepare($query);
        $sth->bindParam('page', $start, PDO::PARAM_INT);
        $sth->bindParam('length', $pageLength, PDO::PARAM_INT);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
    }

    public function getByUser(int $userId): array
    {
        $query= "SELECT b.* FROM borrowed_books bb LEFT JOIN book b ON bb.book_id = b.id WHERE bb.customer_id = :id";
        $sth = $this->db->prepare($query);
        $sth->execute(['id' => $userId]);

        return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
    }

    public function search(string $title, string $author): array
    {
        $query = "SELECT * FROM book WHERE title LIKE :title AND author LIKE :author";
        $sth = $this->db->prepare($query);
        $sth->bindParam('author', "%$author%");
        $sth->bindParam('title', "%$title");
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
    }

    public function borrow(BOOK $book, int $userId)
    {
        $query = "INSERT INTO borrowed_books (book_id, customer_id, start) VALUES (:book, :user, NOW())";
        $sth = $this->db->prepare($query);
        $sth->bindValue('book', $book->getId());
        $sth->bindValue('user', $userId);

        if (!$sth->execute()) {
            throw new DbException($sth->errorInfo()[2]);
        }
        $this->updateBookStock($book);
    }

    public function returnBook(Book $book, int $userId)
    {
        $query = "UPDATE borrowed_books SET end = NOW() WHERE book_id = :book_id AND customer_id =:user AND end IS NULL";
        $sth = $this->db->prepare($query);
        $sth->bindParam('book_id', $book->getId());
        $sth->bindParam('user', $UserId);
        if (!$sth->execute()) {
            throw new DbException($sth->errorInfo()[2]);
        }

        $this->updateBookStock($book);
    }

    public function updateBookStock(Book $book)
    {
        $query = 'UPDATE book SET stock = :stock WHERE id =:id';
        $sth = $this->db->prepare($query);
        $sth->bindValue('id', $book->getId());
        $sth->bindValue('stock', $book->getStock());

        if (!$sth->execute()) {
            throw new DbException($sth->errorInfo()[2]);
        }
    }
}
