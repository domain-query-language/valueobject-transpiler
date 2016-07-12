<?php namespace ValueObject;

use EventSourced\ValueObject\ValueObject\Type\AbstractComposite;

class Range extends AbstractComposite 
{
    private $min;
    private $max;

    public function __construct(Quantity $min, Quantity $max)
    {
        $this->min = $min;
        $this->max = $max;
    }
    
    public function min()
    {
        return $this->min;
    }

    public function max()
    {
        return $this->max;
    }
}

