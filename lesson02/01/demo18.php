<?php

namespace lesson02\example1\demo18;

class Student
{
    public function __invoke($params)
    {
        return 'Invoke ' . print_r($params, true);
    }
}

$student = new Student();

echo $student(123) . PHP_EOL;