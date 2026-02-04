<?php

namespace lesson05\php\demo01\example01\index08;

use ArrayAccess;
use IteratorAggregate;

class PhonesCollection implements IteratorAggregate, ArrayAccess
{
    private $phones = [];
    private $index = 0;

    public function __construct(array $phones)
    {
        $this->phones = array_values(array_unique($phones));
    }

    public function add($phone)
    {
        if($this->has($phone)) {
            throw new \DomainException('Phone already exists');
        }
        $this->phones[] = $phone;
    }

    public function remove($phone)
    {
        if(!$this->has($phone)) {
            throw new \DomainException('Phone doesnt exists');
        }
        $this->phones = array_values(array_diff($this->phones, [$phone]));
    }

    public function has($phone)
    {
        return in_array($phone, $this->phones);
    }

    public function getIterator()
    {
        return new \ArrayIterator(array_values($this->phones));
    }

    #####
    public function offsetExists($offset) {
        return array_key_exists($offset, $this->phones);
    }

    public function offsetGet($offset) {
        return $this->phones[$offset];
    }

    public function offsetSet($offset, $value) {
        if($this->has($value)) {
            throw new \DomainException('Phone already exists');
        }
        if($offset) {
            $this->phones[] = $value;
        } else {
            $this->phones[$offset] = $value;
        }
    }

    public function offsetUnset($offset) {
        unset($this->phones[$offset]);
    }

    #####


}

$phones = new PhonesCollection(['88001', '88002', '88003']);

foreach($phones as $phone) {
    echo $phone . PHP_EOL;
}

echo $phones[0] . PHP_EOL;