<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type\AbstractComposite;

class ID extends AbstractComposite 
{   
    protected $type;
    protected $name;

    public function __construct(Type $type, Name $name) 
	{
        $this->type = $type;
        $this->name = $name;
    }
    
    public function type()
    {
        return $this->type;
    }
    
    public function name()
    {
        return $this->name;
    }
}