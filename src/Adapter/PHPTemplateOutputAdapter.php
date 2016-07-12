<?php namespace Adapter;

use Domain\Generator\ValueObject;
use EventSourced\ValueObject\Serializer\Serializer;
use League\Plates\Engine as Templator;

class PHPTemplateOutputAdapter implements \App\Generator\OutputAdapter
{
    private $serializer;
    private $templater;
    private $file_system;
    
    public function __construct(Serializer $serializer, Templator $templater, \App\Generator\FileSystem $file_system)
    {
        $this->serializer = $serializer;
        $this->templater = $templater;
        $this->file_system = $file_system;
    }
    
    public function store_schemas(ValueObject\Schemas $schemas, $config_file_path)
    {
        foreach ($schemas->collection() as $schema) {
            $namespace = $this->convert_file_path_to_namespace($config_file_path);
            $template = $this->generate_template($schema, $namespace);
            $this->store_template($schema->name(), $config_file_path, $template);
        }
    }
    
    private function convert_file_path_to_namespace($file_path)
    {
        $parts = array_map(function($part){
            return ucfirst($part);
        }, explode("/", $this->path_to_file($file_path)));
        return implode("\\", $parts);
    }
    
    private function path_to_file($file_path)
    {
        $parts = explode("/", $file_path);
        array_pop($parts);
        return implode('/', $parts);
    }
    
    private function generate_template(ValueObject\Schema $schema, $snamespace)
    {
        $schema_tree = $this->serializer->serialize($schema);
        $schema_tree['namespace'] = $snamespace;
        return $this->templater->render("value", $schema_tree);
    }
    
    private function store_template(ValueObject\Name $name, $config_file_path, $template)
    {
        $path = $this->path_to_file($config_file_path).'/'.$name->value().".php";
        $this->file_system->store($path, $template);
    }
}