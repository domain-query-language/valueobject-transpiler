<?php namespace App\Generator;

class Generator
{
    public function __construct(InputAdapter $input, OutputAdapter $output)
    {
        
    }
    
    public function run()
    {
        $schemas = $this->input->load_schemas();        
        $this->output->store_schemas($schemas);
    }
}

