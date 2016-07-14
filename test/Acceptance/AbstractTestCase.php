<?php namespace Test\Acceptance;

abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase
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
    
    abstract protected function yaml_config();
    
    private function create_config_file()
    {
        $this->fake_file_system->store('test/generated/vos.yaml', $this->yaml_config());
    }
    
    private function run_generator()
    {
        $this->controller->generate($this->base_folder);
    }
    
    abstract protected function class_name();
    
    private function ensure_file_exists()
    {
        //Compare the generated file with 
        $actual = $this->fake_file_system->fetch("./test/generated/".$this->class_name().".php");
        $expected = $this->load_generated_template();
        $this->assertEquals($expected, $actual, "Generated VO does not match expected template");
    }
    
    private function load_generated_template()
    {
        $path = ROOT_DIR."/test/Acceptance/Expected/Generated".$this->class_name().".php";
        if (!is_file($path)) {
            throw new \Exception("Expected a sample generated class for '".$this->class_name()."', found none. Please add the following file to continue. '$path'");
        }
        return file_get_contents($path);
    }
}