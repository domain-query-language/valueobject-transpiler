<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type\AbstractComposite;

class Validator extends AbstractComposite 
{   
    protected $name;
    protected $arguments;
    
    public function __construct(Name $name, Arguments $arguments) 
	{
        $this->name = $name;
        $this->arguments = $arguments;
    }
    
    public function name()
    {
        return $this->name;
    }
    
    public function arguments()
    {
        return $this->arguments;
    }
}