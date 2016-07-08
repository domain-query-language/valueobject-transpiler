<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type\AbstractCollection;

class Arguments extends AbstractCollection 
{    
    public function collection_of()
    {
        return Argument::class;
    }
}
