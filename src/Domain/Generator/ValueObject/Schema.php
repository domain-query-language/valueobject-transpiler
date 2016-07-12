<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type\AbstractTreeNode;

class Schema extends AbstractTreeNode 
{    
    static protected function accepts()
    {
        return [
            'composite' => Schema\Composite::class,
            'value' => Schema\Value::class
        ];
    }
}
