<?php namespace Domain\Generator\ValueObject\Schema;

use EventSourced\ValueObject\ValueObject\Type\AbstractComposite;
use Domain\Generator\ValueObject;

class TreeNode extends AbstractComposite 
{   
    protected $id;
    protected $node_options;
    
    public function __construct(ValueObject\ID $id, ValueObject\TreeNode $node_options) 
	{
        $this->id = $id;
        $this->node_options = $node_options;
    }
    
    public function id()
    {
        return $this->id;
    }
    
    public function node_options()
    {
        return $this->node_options;
    }
}