<?php

namespace lesson02\example2\demo12;

class Student
{
    public $firstName;
    public $lastName;
    public $birthDate;

    public function __construct($lastName, $firstName, $birthDate)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
    }

    public function getFullName()
    {
        return $this->lastName . ' ' . $this->firstName;
    }

}

class TXTStudentRepository
{
    private $file;

    public function __construct($file) {
        $this->file = $file;
    }

    public function loadAll()
    {
        $rows = file($this->file);
        $students = [];
        foreach ($rows as $row) {
            $values = array_map('trim', explode(';', $row));
            $student = new Student($values[0], $values[1], $values[2]);
            $students[] = $student;
        }

        return $students;
    }

}

$file = __DIR__ . '/list.txt';

$studentRepository = new TXTStudentRepository($file);

$students = $studentRepository->loadAll();

foreach ($students as $student) {
    echo $student->getFullName() . ' ' . $student->birthDate . PHP_EOL;
}


