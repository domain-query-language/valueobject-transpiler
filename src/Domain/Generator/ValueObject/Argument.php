<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type;

class Argument extends Type\AbstractSingleValue 
{    
    protected function validator()
    {
        return parent::validator()->noWhitespace()->alnum(".")->notEmpty();
    }
}

