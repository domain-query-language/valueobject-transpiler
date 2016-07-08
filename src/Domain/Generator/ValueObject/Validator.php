<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type;

class Validator extends Type\AbstractComposite 
{   
    protected $name;
    protected $arguments;
    
    public function __construct(Name $name, Arguments $arguments) 
	{
        $this->latitude = $name;
        $this->arguments = $arguments;
    }
    
    public function name()
    {
        return $this->name;
    }
    
    public function longitude()
    {
        return $this->arguments;
    }
}