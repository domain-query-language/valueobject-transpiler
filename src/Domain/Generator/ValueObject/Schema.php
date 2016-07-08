<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type\AbstractComposite;

class Schema extends AbstractComposite 
{   
    protected $name;
    protected $type;
    protected $validators;
    
    public function __construct(Name $name, Type $type, Validators $validators) 
	{
        $this->name = $name;
        $this->type = $type;
        $this->validators = $validators;
    }
    
    public function name()
    {
        return $this->name;
    }
    
    public function type()
    {
        return $this->type;
    }
    
    public function validators()
    {
        return $this->validators;
    }
}