<?php namespace Domain\Generator\ValueObject\Schema;

use EventSourced\ValueObject\ValueObject\Type\AbstractComposite;
use Domain\Generator\ValueObject;

class Entity extends AbstractComposite 
{   
    protected $id;
    protected $properties;
    
    public function __construct(ValueObject\ID $id, ValueObject\Properties $properties) 
	{
        $this->id = $id;
        $this->properties = $properties;
    }
    
    public function id()
    {
        return $this->id;
    }
    
    public function properties()
    {
        return $this->properties;
    }
}