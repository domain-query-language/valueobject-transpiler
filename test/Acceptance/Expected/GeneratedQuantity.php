<?php namespace Test\Generated;

use EventSourced\ValueObject\ValueObject\Type\AbstractComposite;

class Quantity extends AbstractComposite 
{
    private $min;
    private $max;

    public function __construct(Integer $min, Integer $max)
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

