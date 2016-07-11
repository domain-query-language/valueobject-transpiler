<?php namespace Test\Generated;

use EventSourced\ValueObject\ValueObject\Type\AbstractSingleValue;

class Coordinate extends AbstractSingleValue 
{    
    protected function validator()
    {
        return parent::validator()->floatVal()->between(-90, 90);
    }
}

