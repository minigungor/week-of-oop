<?php

namespace lesson02\example3\demo12;

class Name
{
    public $first;
    public $last;

    public function __construct($first, $last)
    {
        $this->first = $first;
        $this->last = $last;
    }
}

class Phone
{
    public $code;
    public $number;

    public function __construct($code, $number)
    {
        $this->code = $code;
        $this->number = $number;
    }
}

class Address
{
    public $country;
    public $region;
    public $city;
    public $street;
    public $house;

    public function __construct($country, $region, $city, $street, $house)
    {
        $this->country = $country;
        $this->region = $region;
        $this->city = $city;
        $this->street = $street;
        $this->house = $house;
    }
}

class Employee
{
    public $id;
    public $name;
    public $phone;
    public $address;

    public function __construct($employeeId, Name $name, Phone $phone, Address $address)
    {
        $this->id = $employeeId;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }
}


class StaffService
{
    public function recruitEmployee(Name $name, Phone $phone, Address $address)
    {
        $employee = new Employee($this->generateId(), $name, $phone, $address);

        $this->save($employee);
        return $employee;
    }

    private function generateId() {
        return rand(10000, 99999);
    }
    private function save(Employee $employee) {
        //
    }
}

$name = new Name('Вася', 'Пупкин');
$phone = new Phone(7, '920000000');
$address = new Address('Россия', 'Липецкая обл.', 'г. Пушкин', 'ул. Ленина', 1);

$service = new StaffService();
$employee = $service->recruitEmployee($name, $phone, $address);

echo $employee->phone->number . PHP_EOL;


