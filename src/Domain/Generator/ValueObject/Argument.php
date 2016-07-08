<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type\AbstractSingleValue;

class Argument extends AbstractSingleValue 
{    
    protected function validator()
    {
        return parent::validator()->noWhitespace()->alnum(".-")->notEmpty();
    }
}

