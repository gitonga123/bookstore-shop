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

// testing
// using pHPUnit
// AEIOU principles;
// Automatic, Extensive, Immediate, Open, Useful.
// Unit tests = test a single class, or method, isolating them from the rest of the code.,
// Integration tests = their aim is to verfiy that all the pieces of your application work together, so their scope is not limited to a class || function, but rather includes a set of classes or the whole application.
// Accepatance test: they try to test a whole functionalty from the user's point of view.
// code coverage = the amount of code that our tests execute, that is, the percentage of tested code. 

// PHPUnit is a framework that provides a set of tools to write tests in a manner that gives us the ability to run tests automatically and delivers useful feedback to the developer.