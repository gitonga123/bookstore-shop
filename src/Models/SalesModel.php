<?php
/**
 * Created by PhpStorm.
 * User: otbafrica
 * Date: 14/09/18
 * Time: 11:41
 */

namespace Bookstore\Models;

use Bookstore\Domain\Sale;
use Bookstore\Exceptions\DbException;
use Bookstore\Exceptions\NotFoundExceptions;
use PDO;

class SalesModel extends AbstractModel
{
    const CLASSNAME = "\Bookstore\Domain\Sale";

    public function getByUser(int $userId): array
    {
        $query = "SELECT * FROM sale WHERE s.customer_id = :user";
        $sth = $this->db->prepare($query);
        $sth->execute(['user' => $userId]);

        return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
    }

    public function get(int $saleId): Sale
    {
        $query = "SELECT * FROM sale  WHERE id =:id";
        $sth = $this->db->prepare($query);
        $sth->execute(['id' => $saleId]);
        $sales = $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);

        if (empty($sales)) {
            throw new NotFoundExceptions('Sale not found.');
        }
        $sale = array_pop($sales);

        $query = "SELECT b.id, b.title, b.author, b.price, sb.amount as stock, b.isbn
        FROM sale s
        LEFT JOIN sale_book sb ON s.id = sb.saled_id
        LEFT JOIN book b ON sb.book_id = b.id";
        $sth = $this->db->prepare($query);
        $sth->execute(['id' => $saleId]);
        $books = $sth->fetchAll(PDO::FETCH_CLASS, BookModel::CLASSNAME);
        $sale->setBooks($books);
        return $sale;
    }

    public function create(Sale $sale)
    {
        $this->db->beginTransaction();
        $query = "INSERT INTO sale (customer_id, date) VALUES (:id, NOW())";
        $sth = $this->db->prepare($query);

        if (!$sth->execute(['id' => $sale->getCustomerId()])) {
            $this->db->rollBack();
            throw new DbException($sth->errorInfo()[2]);
        }
        $saleId = $this->db->lastInsertId();
        $query = "INSERT INTO sale_book(sale_id, book_id, amount) VALUES(:sale, :book, :amount)";

        $sth = $this->db->prepare($query);
        $sth->bindValue('sale', $saleId);
        foreach ($sale->getBooks() as $bookId => $amount) {
            $sth->bindValue('book', $bookId);
            $sth->bindValue('amount', $amount);
            if (!$sth->execute()) {
                $this->db->rollBack();
                throw new DbException($sth->errorInfo()[2]);
            }
        }
        $this->db->commit();
    }
}
