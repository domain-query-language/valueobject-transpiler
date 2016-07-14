<?php namespace Sample\ValueObject;

use EventSourced\ValueObject\ValueObject\Type\AbstractSingleValue;

class Integer extends AbstractSingleValue 
{    
    protected function validator()
    {
        return parent::validator()->intVal();
    }
}

