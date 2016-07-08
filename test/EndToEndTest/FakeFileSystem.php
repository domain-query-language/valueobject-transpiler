<?php namespace Test\EndToEndTest;

use League\Flysystem\Filesystem;
use League\Flysystem\Memory\MemoryAdapter;

class FakeFileSystem implements \App\Generator\FileSystem
{
    private $fly_system;
    
    public function __construct()
    {
        $this->fly_system = new Filesystem(new MemoryAdapter());
    }

    public function fetch($file_path)
    {
        return $this->fly_system->read($file_path);
    }

    public function store($filename, $data)
    {
        $this->fly_system->put($filename, $data);
    }
}
