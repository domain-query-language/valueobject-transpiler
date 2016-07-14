<?php namespace Test\Generated;

use EventSourced\ValueObject\ValueObject\Type\AbstractEntity;

class Person extends AbstractEntity
{
    private $age;

    public function __construct(Integer $id, Integer $age)
    {
        $this->age = $age;
        parent::__construct($id);
    }
    
    public function age()
    {
        return $this->age;
    }
}

