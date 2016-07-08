<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type;

class Validators extends Type\AbstractCollection 
{    
    public function collection_of()
    {
        return Validator::class;
    }
}
