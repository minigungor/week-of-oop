<?php

function getFullName($lastName, $firstName) {
    return $lastName . ' ' . $firstName;
}

$student = [
    'firstName' => 'Vasya',
    'lastName' => 'Pupkin',
    'birthDate' => '1990-01-12',
];

$student['fullName'] = 'Petya';

echo getFullName($student['firstName'], $student['lastName']) . PHP_EOL;
