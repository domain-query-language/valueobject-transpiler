<?php namespace Test\Generated;

use EventSourced\ValueObject\ValueObject\Type\AbstractTreeNode;

class Number extends AbstractTreeNode 
{
    static protected function accepts()
    {
        return [
            'Integer' => Integer::class,
            'Double' => Double::class        
        ];
    }
}
