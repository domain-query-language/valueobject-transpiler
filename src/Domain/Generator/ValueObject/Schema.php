<?php namespace Domain\Generator\ValueObject;

use EventSourced\ValueObject\ValueObject\Type\AbstractTreeNode;

class Schema extends AbstractTreeNode 
{    
    static protected function accepts()
    {
        return [
            'value' => Schema\Value::class,
            'entity' => Schema\Entity::class,
            'composite' => Schema\Composite::class,
            'collection' => Schema\Collection::class,
            'treenode' => Schema\TreeNode::class
        ];
    }
}
