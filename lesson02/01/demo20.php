<?php

namespace lesson02\example1\demo20;


class Student {

    const TYPE_OCHN = 0;
    const TYPE_ZAOCHN = 1;

    private $firstName;
    private $lastName;
    private $type;

    public function __construct($firstName, $lastName, $type = self::TYPE_OCHN) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->type = $type;
    }

    public function getFullName() {
        return $this->lastName . ' ' . $this->firstName;
    }

    public function getType() {
        return $this->type;
    }

    public function isOchn() {
        return $this->type === self::TYPE_OCHN;
    }

    public function isZaochn() {
        return $this->type === self::TYPE_ZAOCHN;
    }

}

$student1 = new Student('Vasya', 'Pupkin');
$student2 = new Student('Petya', 'Ivanov', Student::TYPE_OCHN);
$student3 = new Student('Vasya', 'Pupkin', Student::TYPE_ZAOCHN);

echo $student1->getFullName() . PHP_EOL;
echo $student2->getFullName() . PHP_EOL;
echo $student3->getFullName() . PHP_EOL ;

if($student1->isOchn()) {
    echo 'Очный' . PHP_EOL;
}