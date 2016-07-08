<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type\AbstractCollection;

class Schemas extends AbstractCollection 
{    
    public function collection_of()
    {
        return Schema::class;
    }
}
