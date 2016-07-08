<?php namespace App\Generator;

class Generator
{
    private $input;
    private $output;
    
    public function __construct(InputAdapter $input, OutputAdapter $output)
    {
        $this->input = $input;
        $this->output = $output;
    }
    
    public function run()
    {
        $schemas = $this->input->load_schemas();        
        $this->output->store_schemas($schemas);
    }
}

