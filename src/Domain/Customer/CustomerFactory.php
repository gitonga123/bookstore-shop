<?php
/**
 * Created by PhpStorm.
 * User: otbafrica
 * Date: 14/09/18
 * Time: 14:37
 */

namespace Bookstore\Domain\Customer;

use Bookstore\Domain\Customer;

class CustomerFactory
{
   public static function factory(string $type,
                                  int $id,
                                  string $firstname,
                                  string $surname,
                                  string $email): Customer
   {
//       switch ($type) {
//           case 'basic':
//               return new Basic($id, $firstname, $surname, $email);
//           case 'premium':
//               return new Premium($id, $firstname, $surname, $email);
//       }
       $classname = __NAMESPACE__. '\\' . ucfirst($type);
       if (!class_exists($classname)) {
           throw new \InvalidArgumentException('Wrong Type.');
       }
       return new $classname($id, $firstname, $surname, $email);
   }
}