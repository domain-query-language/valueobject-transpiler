<?php namespace ValueObject\SubFolder;

use EventSourced\ValueObject\ValueObject\Type\AbstractSingleValue;

class Quantity extends AbstractSingleValue 
{    
    protected function validator()
    {
        return parent::validator()->intval()->between(1, 20);
    }
}

