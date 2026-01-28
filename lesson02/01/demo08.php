<?php

namespace lesson02\example1\demo08;

use http\Exception\InvalidArgumentException;

Class Student {
    private $firstName;
    private $lastName;

    public function getFullName() {
        return $this->lastName . ' ' . $this->firstName;
    }

    public function rename($firstName, $lastName) {
        if(empty($firstName) || empty($lastName)) {
            throw new InvalidArgumentException('Введите имя и фамилию');
        }
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

}

$student = new Student();

$student->rename('Petya', 'Ivanov');

echo $student->getFullName() . PHP_EOL;