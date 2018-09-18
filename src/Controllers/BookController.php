<?php
/**
 * Created by PhpStorm.
 * User: otbafrica
 * Date: 18/09/18
 * Time: 12:55
 */

namespace Bookstore\Controllers;
use Bookstore\Models\BookModel;


class BookController extends AbstractController
{
    const PAGE_LENGTH = 10;

    public function getAllWithPage($page): string
    {
        $page = (int) $page;
        $bookModel = new BookModel($this->db);
        $books = $bookModel->getAll($page, self::PAGE_LENGTH);
        $properties = [
            'books' => $books,
            'currentPage' => $page,
            'lastPage' => count($books) < self::PAGE_LENGTH
        ];

        return $this->render('books.twig', $properties);
    }

    public function getAll(): string
    {
        return $this->getAllWithPage(1);
    }

    public function get(int $bookId): string
    {
        $bookModel = new BookModel($this->db);

        try {
            $book = $bookModel->get($bookId);
        } catch (\Exception $e) {
            $this->log->error(
                'Error getting book: ' . $e->getMessage()
            );
            $properties = ['errorMessage' => 'Book Not Found!'];
            return $this->render('error.twig', $properties);
        }

        $properties = ['book' => $book];
        return $this->render('book.twig', $properties);
    }

    public function getByUser(): string
    {
        $bookModel = new BookModel($this->db);
        $books = $bookModel->getByUser($this->CustomerId);

        $properties = [
            'books' => $books,
            'currentPage' => 1,
            'lastPage' => true
        ];

        return $this->render('books.twig', $properties);
    }
}