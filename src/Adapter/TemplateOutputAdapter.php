<?php namespace Adapter;

use Domain\Generator\ValueObject;
use EventSourced\ValueObject\Serializer\Serializer;
use League\Plates\Engine as Templator;
use App\Generator\FileSystem;

class TemplateOutputAdapter implements \App\Generator\OutputAdapter
{
    private $file_system;
    private $serializer;
    private $templater;
    
    public function __construct(Serializer $serializer, Templator $templater, FileSystem $file_system)
    {
        $this->serializer = $serializer;
        $this->templater = $templater;
        $this->file_system = $file_system;
    }
    
    public function store_schemas(ValueObject\Schemas $schemas)
    {
        foreach ($schemas->collection() as $schema) {
            $template = $this->generate_template($schema);
            $this->store_template($schema->name(), $template);
        }
    }
    
    private function generate_template(ValueObject\Schema $schema)
    {
        $schema_tree = $this->serializer->serialize($schema);
        return $this->templater->render("value", $schema_tree);
    }
    
    private function store_template(ValueObject\Name $name, $template)
    {
        $path = $name->value().".php";
        $this->file_system->store($path, $template);
    }
}