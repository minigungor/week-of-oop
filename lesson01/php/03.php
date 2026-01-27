<?php

namespace demo03;

class Student {
    var $firstname;
    var $lastname;
    var $birthDate;

    function getFullName() {
        return $this->lastname . ' ' . $this->firstname;
    }
}

$student1 = new Student();

$student1->firstname = 'Vasya';
$student1->lastname = 'Pupkin';

$student2 = new Student();

$student2->firstname = 'Petya';
$student2->lastname = 'Ivanov';

echo $student1->getFullName() . PHP_EOL;
echo $student2->getFullName() . PHP_EOL;