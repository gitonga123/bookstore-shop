<?php
// Singletons are used when you want one class to always have one unique instance.
namespace Bookstore\Core;

use Bookstore\Exceptions\NotFoundException;

/**
 * Database configuration file
 */
class Config
{
    private $data;
    private static $instance;

    private function __construct()
    {
        $json = file_get_contents(__DIR__. '/../config/app.json');
        $this->data = json_decode($json, true);
    }

    public function get($key)
    {
        if (!isset($this->data[$key])) {
             throw new NotFoundException("Key $key not in config.");
        }
        return $this->data[$key];
    }
}
