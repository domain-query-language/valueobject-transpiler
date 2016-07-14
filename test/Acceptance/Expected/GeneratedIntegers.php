<?php namespace Test\Generated;

use EventSourced\ValueObject\ValueObject\Type\AbstractCollection;

class Integers extends AbstractCollection 
{
    public function collection_of()
    {
        return Integer::class;
    }
}

