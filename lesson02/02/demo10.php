<?php

namespace lesson02\example2\demo10;

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

class StudentRepository
{
    public function loadAll($file)
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

    public function saveAll(array $students, $file)
    {
        $rows = [];
        foreach ($students as $student) {
            $rows[] = implode(';', [$student->lastName, $student->firstName, $student->birthDate]);
        }
        file_put_contents($file, implode(PHP_EOL, $rows));
    }
}

$file = __DIR__ . '/list.txt';

$studentRepository = new StudentRepository();

$students = $studentRepository->loadAll($file);

foreach ($students as $student) {
    echo $student->getFullName() . ' ' . $student->birthDate . PHP_EOL;
}

$studentRepository->saveAll($students, __DIR__ . $file);

