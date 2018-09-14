<?php
/**
 * Created by PhpStorm.
 * User: otbafrica
 * Date: 14/09/18
 * Time: 12:38
 */
class Pops {
    public function sayHi() {
        echo "Hi, I am Pops 1";
    }
}

class Child extends Pops{
    public function sayHi() {
        echo "Hi, am a child.";
        parent::sayHi();
    }
}

$pops = new  Pops();
$child = new Child();

echo $pops->sayHi() . "\n";
echo $child->sayHi() ."\n";