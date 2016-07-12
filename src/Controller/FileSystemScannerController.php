<?php namespace Controller;

use Controller\SchemaFactory;
use Adapter\PHPTemplateOutputAdapter;
use App\Generator\FileSystem;

class FileSystemScannerController
{
    private $schema_factory;
    private $templator;
    private $file_system;
    
    public function __construct(
        SchemaFactory $schema_factory, 
        PHPTemplateOutputAdapter $templator,
        FileSystem $file_system)
    {
        $this->schema_factory = $schema_factory;
        $this->templator = $templator;
        $this->file_system = $file_system;
    }
    
    public function generate()
    {
        foreach ($this->file_system->list_config_files() as $config_file_path) {
            $schema = $this->schema_factory->yaml_file($config_file_path);
            $this->templator->store_schemas($schema, $config_file_path);
        }
    }
}
   