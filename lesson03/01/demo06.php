<?php

namespace lesson03\example1\demo06;

class Base
{
    public $name;
    public $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }
}

class Sub extends Base
{
    public $status;
    public function __construct($name, $email, $status)
    {
        $this->status = $status;
        $this->name = $name;
        $this->email = $email;
    }
}

/*
 * class Sub extends Base
{
    public $status;
    public function __construct($name, $email, $status)
    {
        parent::__construct($name, $email);
        $this->status = $status;
    }
}
 * */

new Base('Vasya', 'admin@mail.ru');
new Base('Vasya', 'user@mail.ru', 1);