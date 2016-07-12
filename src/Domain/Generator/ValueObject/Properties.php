<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type\AbstractCollection;

class Properties extends AbstractCollection 
{    
    public function collection_of()
    {
        return Property::class;
    }
}
