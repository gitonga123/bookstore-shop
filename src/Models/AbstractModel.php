<?php

namespace Bookstore\Models;

use PDO;

/**
 * All Models to extend this class.
 * Class contain a $db protected property that will be set on the constructor.
 */

abstract class AbstractModel
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
}
