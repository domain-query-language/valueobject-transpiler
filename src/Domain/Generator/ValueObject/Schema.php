<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type;

class Schema extends Type\AbstractComposite 
{   
    protected $name;
    protected $type;
    protected $arguments;
    
    public function __construct(Name $name, Type $type, Arguments $arguments) 
	{
        $this->name = $name;
        $this->type = $type;
        $this->arguments = $arguments;
    }
    
    public function name()
    {
        return $this->name;
    }
    
    public function type()
    {
        return $this->type;
    }
    
    public function arguments()
    {
        return $this->arguments;
    }
}