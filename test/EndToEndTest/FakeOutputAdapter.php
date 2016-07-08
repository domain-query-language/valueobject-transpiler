<?php namespace Test\EndToEndTest;

use Domain\Generator\ValueObject;

class FakeOutputAdapter implements \App\Generator\OutputAdapter
{
    public function store_schemas(ValueObject\Schemas $schemas)
    {
        foreach ($schemas as $schema) {
            $template = $this->generate_template($schema);
            $this->store_template($schema->name(), $template);
        }
    }
    
    private function generate_template(ValueObject\Schema $schema)
    {
        
    }
    
    private function store_temlate(ValueObject\Name $name, $template)
    {
        
    }
}