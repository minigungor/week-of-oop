<?php

namespace demo02;

class Student {
    var $firstname;
    var $lastname;
    var $birthDate;

    function getFullName() {
        return $this->lastname . ' ' . $this->firstname;
    }
}

$student = new Student();

$student->firstname = 'Vasya';
$student->lastname = 'Pupkin';

echo $student->getFullName() . PHP_EOL;