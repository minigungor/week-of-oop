<?php

namespace lesson03\example2\demo00;

abstract class Animal
{
public $color;
public $weight;

public function sleep()
{
// ...
}

abstract public function voice();

}

interface Eatable
{

}

class Dog extends Animal implements Eatable
{
public function voice()
{
return 'ruf-ruf';
}

public function catch()
{

}
}

class Cat extends Animal implements Eatable
{
public function voice()
{
return 'meow-meow';
}
}

class Tiger extends Animal
{
public function voice()
{
return 'roar';
}

public function eat($food)
{
if($food instanceof Eatable) {
throw new \Exception('I am not...');
}
}
}

class Skuns extends Animal
{
    public function voice() {
        return 'mph-mph';
    }

}


$dog = new Dog();
echo $dog->voice();
echo $dog->sleep();

$cat = new Cat();
echo $cat->voice();
echo $cat->sleep();

$tiger = new Tiger();
echo $tiger->voice();
echo $tiger->sleep();
echo $tiger->eat($cat);
echo $tiger->eat($dog);

$skuns = new Skuns();
echo $skuns->voice();
echo $tiger->eat($skuns);