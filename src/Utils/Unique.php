<?php
/**
 * Created by PhpStorm.
 * User: otbafrica
 * Date: 14/09/18
 * Time: 14:10
 */

namespace Bookstore\Utils;


trait Unique
{
    private static $lastId = 0;
    protected $id;

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        if (empty($id)) {
            $this->id = ++self::$lastId;
        } else {
            $this->id = $id;
            if ($id > self::$lastId) {
                self::$lastId = $id;
            }
        }
    }

    /**
     * @return int
     */
    public static function getLastId(): int
    {
        return self::$lastId;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}