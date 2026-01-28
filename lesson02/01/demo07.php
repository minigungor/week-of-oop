<?php

namespace lesson02\example1\demo07;

use http\Exception\InvalidArgumentException;

Class Student {
    public $firstName;
    public $lastName;

    public function getFullName() {
        return $this->lastName . ' ' . $this->firstName;
    }

    public function rename($firstName, $lastName) {
        if(empty($firstName)) {
            throw new InvalidArgumentException('Введите имя');
        }
        if(empty($lastName)) {
            throw new InvalidArgumentException('Введите фамилию');
        }
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

}

$student = new Student();

$student->firstName = 'Vasya';
$student->lastName = 'Pupkin';

echo $student->getFullName() . PHP_EOL;

$student->rename('Petya', 'Ivanov');

echo $student->getFullName() . PHP_EOL;