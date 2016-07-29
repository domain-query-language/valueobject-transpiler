<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type;

class Name extends Type\AbstractSingleValue 
{    
    protected function validator()
    {
        return parent::validator()->noWhitespace()->alnum("_.-")->notEmpty();
    }
}

