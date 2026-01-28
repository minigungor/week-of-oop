<?php

namespace lesson02\example1\demo17;

class Student
{
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function rename($firstName, $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function __toString() {
        return $this->getFullName();
    }
}


$student = new Student('Petya', 'Ivanov');

echo $student->getFullName() . PHP_EOL;

$student->rename('Vasya', 'Pupkin');

echo $student . PHP_EOL;