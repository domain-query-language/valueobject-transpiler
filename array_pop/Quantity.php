<?php use EventSourced\ValueObject\ValueObject\Type\AbstractSingleValue;

class Quantity extends AbstractSingleValue 
{    
    protected function validator()
    {
        return parent::validator()->intval(between);
    }
}
