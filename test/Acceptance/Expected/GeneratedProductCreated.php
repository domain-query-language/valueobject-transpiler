<?php namespace Test\Generated;

use EventSourced\ValueObject\ValueObject\Type\AbstractEntity;
use EventSourced\ValueObject\ValueObject\Uuid;

class ProductCreated extends AbstractEntity
{
    private $aggregate_id;
    private $product;

    public function __construct(Uuid $id, Uuid $aggregate_id, Product $product)
    {
        $this->aggregate_id = $aggregate_id;
        $this->product = $product;
        parent::__construct($id);
    }
    
    public function aggregate_id()
    {
        return $this->aggregate_id;
    }

    public function product()
    {
        return $this->product;
    }
}

