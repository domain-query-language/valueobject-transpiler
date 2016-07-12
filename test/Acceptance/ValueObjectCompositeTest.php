<?php namespace Test\Acceptance;

class ValueObjectCompositeTest extends TestCase
{
    private $fake_file_system;
    private $output_adapter;
    private $base_folder;
    private $controller;
    
    public function setUp()
    {
        $this->fake_file_system = new \Adapter\FileSystem( 
            new \League\Flysystem\Memory\MemoryAdapter() 
        );
        $this->base_folder = "./";
        
        $reflector = new \EventSourced\ValueObject\Reflector\Reflector();
        $serializer = new \EventSourced\ValueObject\Serializer\Serializer($reflector);
        $templater = new \League\Plates\Engine(ROOT_DIR."/src/Adapter/TemplateOutputAdapter/templates");
        $this->output_adapter = new \Adapter\PHPTemplateOutputAdapter(
            $serializer, 
            $templater,   
            $this->fake_file_system
        );
         
        $schema_factory = new \Controller\SchemaFactory($this->fake_file_system);
        
        $this->controller = new \Controller\FileSystemScannerController($schema_factory, $this->output_adapter, $this->fake_file_system);
    }
    
    public function test_creating_a_template()
    {
        $this->create_config_file();
        $this->run_generator();
        $this->ensure_file_exists();
    }
    
    private function create_config_file()
    {
        $config = "
value\Quantity: 
    min: value\Integer
    max: value\Integer
        ";
        $this->fake_file_system->store('test/generated/vos.yaml', $config);
    }
    
    private function run_generator()
    {
        $this->controller->generate($this->base_folder);
    }
    
    private function ensure_file_exists()
    {
        //Compare the generated file with 
        $actual = $this->fake_file_system->fetch("./test/generated/Quantity.php");
        $expected = $this->load_generated_template();
        $this->assertEquals($expected, $actual, "Generated VO does not match expected template");
    }
    
    private function load_generated_template()
    {
        $path = ROOT_DIR."/test/Acceptance/Expected/GeneratedQuantity.php";
        return file_get_contents($path);
    }
}