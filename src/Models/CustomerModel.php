<?php

namespace Bookstore\Models;

use Bookstore\Domain\Customer;
use Bookstore\Domain\CustomerFactory;
use Bookstore\Exceptions\NotFoundExceptions;

/**
 * The Customer Model.
 * creates and returns an instance of the customer
 */
class CustomerModel extends AbstractModel
{
    /**
     * get user detail.
     * @param user id
     * @return array as customer details
     */
    public function get(int $userId): Customer
    {
        $query = 'SELECT * FROM customer WHERE customer_id = :user';
        $sth = $this->db->prepare($query);
        $sth->execute(['user' => $userId]);

        $row = $sth->fetch();

        if (empty($row)) {
            throw new NotFoundExceptions();
        }

        return CustomerFactory::factory(
            $row['type'],
            $row['id'],
            $row['firstname'],
            $row['surname'],
            $row['email']
        );
    }

    /**
     * get user detail using email as parameter.
     * @param user email
     * @return array as customer details
     */
    public function getUser(int $email): Customer
    {
        $query = 'SELECT * FROM customer WHERE email = :user';
        $sth = $this->db->prepare($query);
        $sth->execute(['user' => $email]);

        $row = $sth->fetch();

        if (empty($row)) {
            throw new NotFoundExceptions();
        }

        return CustomerFactory::factory(
            $row['type'],
            $row['id'],
            $row['firstname'],
            $row['surname'],
            $row['email']
        );
    }
}
