<?php namespace Domain\Generator\ValueObject\Schema;

use EventSourced\ValueObject\ValueObject\Type\AbstractComposite;
use Domain\Generator\ValueObject;

class Collection extends AbstractComposite 
{   
    protected $id;
    protected $collection_of;
    
    public function __construct(ValueObject\ID $id, ValueObject\ID $collection_of) 
	{
        $this->id = $id;
        $this->collection_of = $collection_of;
    }
    
    public function id()
    {
        return $this->id;
    }
    
    public function collection_of()
    {
        return $this->collection_of;
    }
}