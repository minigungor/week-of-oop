<?php

namespace lesson02\example2\demo08;

class Student
{
    public $firstName;
    public $lastName;
    public $birthDate;

    public function getFullName()
    {
        return $this->lastName . ' ' . $this->firstName;
    }

    public function __construct($lastName, $firstName, $birthDate)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
    }
}

function loadStudentsFromFile($file)
{
    $rows = file($file);

    $students = [];

    foreach ($rows as $row) {
        $values = array_map('trim', explode(';', $row));
        $student = new Student($values[0], $values[1], $values[2]);
        $students[] = $student;
    }

    return $students;
}

function saveStudentsToTxt(array $students, $file)
{
    $rows = [];
    foreach ($students as $student) {
        $rows[] = implode(';', [$student->lastName, $student->firstName, $student->birthDate]);
    }
    file_put_contents($file, implode(PHP_EOL, $rows));
}


$file = __DIR__ . '/list.txt';

$students = loadStudentsFromFile($file);

foreach ($students as $student) {
    echo $student->getFullName() . ' ' . $student->birthDate . PHP_EOL;
}

saveStudentsToTxt($students, __DIR__ . $file);

