<?php namespace App\Generator;

use Domain\Generator\ValueObject\Schemas;

class Generator
{
    private $output;
    
    public function __construct(OutputAdapter $output)
    {
        $this->output = $output;
    }
    
    public function run(Schemas $schemas)
    {      
        $this->output->store_schemas($schemas);
    }
}

