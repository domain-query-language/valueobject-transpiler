<?php namespace Test\EndToEndTest;

use App\Generator\FileSystem;

class FakeInputAdapter implements \App\Generator\InputAdapter
{
    private $file_system;
    
    public function __construct(FileSystem $file_system)
    {
        $this->file_system = $file_system;
    }
    
    public function load_schemas()
    {
        $this->file_system->fetch("./valueobjects.yml");
    }
}