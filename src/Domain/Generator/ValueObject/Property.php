<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type\AbstractComposite;

class Property extends AbstractComposite 
{   
    protected $key;
    protected $id;

    public function __construct(Name $key, ID $id) 
	{
        $this->key = $key;
        $this->id = $id;
    }
    
    public function key()
    {
        return $this->key;
    }
    
    public function id()
    {
        return $this->id;
    }
}