<?php

namespace lesson02\example1\demo22;


class Student {

    const TYPE_OCHN = 0;
    const TYPE_ZAOCHN = 1;

    private $name;
    private $type;

    public function __construct($name, $type) {
        $this->type = $type;
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType() {
        return $this->type;
    }

}

$student = new Student('Vasya', Student::TYPE_ZAOCHN);

echo $student->getType() . PHP_EOL;