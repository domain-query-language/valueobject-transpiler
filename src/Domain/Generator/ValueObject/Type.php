<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type\AbstractSingleValue;

class Type extends AbstractSingleValue 
{    
    protected function validator()
    {
        return parent::validator()->in(['value', 'entity']);
    }
}