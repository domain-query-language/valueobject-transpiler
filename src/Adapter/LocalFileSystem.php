<?php namespace Adapter;

use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

class LocalFileSystem implements \App\Generator\FileSystem
{
    private $fly_system;
    
    public function __construct($root_dir)
    {
        $this->fly_system = new Filesystem(new Local($root_dir));
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
