<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type;

class Arguments extends Type\AbstractCollection 
{    
    public function collection_of()
    {
        return Argument::class;
    }
}
