<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type;

class Schemas extends Type\AbstractCollection 
{    
    public function collection_of()
    {
        return Schema::class;
    }
}
