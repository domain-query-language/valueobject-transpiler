<?php namespace Test;

use App\Generator;

class EndToEndTest extends \PHPUnit_Framework_TestCase
{
    private $fake_file_system;
    
    public function setUp()
    {
        $this->fake_file_system = new EndToEndTest\FakeFileSystem();
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
value\Coordinate: is floatVal and between -90,90       
        ";
        $this->fake_file_system->store("./valueobjects.yml", $config);
    }
    
    private function run_generator()
    {
        $command = new Generator($this->fake_file_system);
        $command->dispatch();    
    }
    
    private function ensure_file_exists()
    {
        //Compare the generated file with 
        $actual = $this->fake_file_system->load("./Coordinate.php");
        $expected = $this->load_generated_template();
        
        $this->assertEquals($expected, $actual, "Generated VO does not match expected template");
    }
    
    private function load_generated_template()
    {
        $test_path = explode("/", __FILE__);
        pop($test_path);
        $path = implode("/", $test_path)."/EndToEndTest/GeneratedQuanityTemplate.php";
        return file_get_contents($path);
    }
}