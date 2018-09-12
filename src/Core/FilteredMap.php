<?php
namespace Bookstore\Core;

/**
 * Filtering Parameters from requests
 */
class ClassName
{
    private $map;

    public function __construct(array $baseMap)
    {
        $this->map = $baseMap;
    }

    public function has(string $name): bool
    {
        return isset($this->map[$name]);
    }

    public function get(string $name)
    {
        return $this->map[$name] ?? null;
    }

    public function getInt(string $name)
    {
        return intval($this->get($name));
    }

    public function getNumber(string $name)
    {
        return floatval($this->get($name));
    }

    public function getString(string $name, bool $filtere = true)
    {
          $value = (string)$this->get($name);
          return $filter ? addslashes($value) : $value;
    }
}
