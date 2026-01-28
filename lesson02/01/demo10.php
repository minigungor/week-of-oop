<?php

namespace lesson02\example1\demo10;

use http\Exception\InvalidArgumentException;

Class Student {
    private $firstName;
    private $lastName;

    public function getFullName() {
        return $this->lastName . ' ' . $this->firstName;
    }

    public function __construct() {
        echo 'Constructor' . PHP_EOL;
    }

    public function rename($firstName, $lastName) {
        if(empty($firstName) || empty($lastName)) {
            throw new InvalidArgumentException('Введите имя и фамилию');
        }
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

}

$student = new Student();

$student->rename('Petya', 'Ivanov');

echo $student->getFullName() . PHP_EOL;