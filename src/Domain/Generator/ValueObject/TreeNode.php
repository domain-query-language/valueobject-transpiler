<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type\AbstractCollection;

class TreeNode extends AbstractCollection 
{    
    public function collection_of()
    {
        return ID::class;
    }
}
