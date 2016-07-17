<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type\AbstractTreeNode;

class Schema extends AbstractTreeNode 
{    
    static protected function accepts()
    {
        return [
            'collection' => Schema\Collection::class,
            'composite' => Schema\Composite::class,
            'entity' => Schema\Entity::class,
            'event'=> Schema\Event::class,
            'treenode' => Schema\TreeNode::class,
            'value' => Schema\Value::class
        ];
    }
}
