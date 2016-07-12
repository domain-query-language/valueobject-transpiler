<?php namespace Domain\Generator\ValueObject\Schema;

use EventSourced\ValueObject\ValueObject\Type\AbstractComposite;
use Domain\Generator\ValueObject;

class Value extends AbstractComposite 
{   
    protected $id;
    protected $validators;
    
    public function __construct(ValueObject\ID $id, ValueObject\Validators $validators) 
	{
        $this->id = $id;
        $this->validators = $validators;
    }
      
    public function id()
    {
        return $this->id;
    }
    
    public function validators()
    {
        return $this->validators;
    }
}