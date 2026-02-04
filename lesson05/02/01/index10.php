<?php

namespace lesson05\php\demo01\example01\index10;

use ArrayAccess;
use IteratorAggregate;
use Countable;
use Serializable;

class PhonesCollection implements IteratorAggregate, ArrayAccess, Countable, Serializable
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

    public function count()
    {
        return count($this->phones);
    }

    ######

    public function serialize()
    {
        return implode(';', $this->phones);
    }

    public function unserialize($serialized)
    {
        return $this->phones = explode(';', $serialized);
    }


}

$phones = new PhonesCollection(['88001', '88002', '88003']);

echo serialize($phones);