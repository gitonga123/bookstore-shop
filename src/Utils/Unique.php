<?php
/**
 * Created by PhpStorm.
 * User: otbafrica
 * Date: 14/09/18
 * Time: 14:10
 */

namespace Bookstore\Utils;

use Bookstore\Exceptions\InvalidIdException;

trait Unique
{
    protected $id;

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
      $this->id = $id;
    }

  
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}