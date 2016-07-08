<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type\AbstractCollection;

class Validators extends AbstractCollection 
{    
    public function collection_of()
    {
        return Validator::class;
    }
}
