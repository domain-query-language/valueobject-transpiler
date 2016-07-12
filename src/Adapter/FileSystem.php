<?php namespace Adapter;

use League\Flysystem\Filesystem;
use League\Flysystem\AdapterInterface;

class FileSystem implements \App\Generator\FileSystem
{
    private $fly_system;
    
    public function __construct(AdapterInterface $adapter)
    {
        $this->fly_system = new Filesystem($adapter);
    }

    public function fetch($file_path)
    {
        return $this->fly_system->read($file_path);
    }

    public function store($filename, $data)
    {
        $this->fly_system->put($filename, $data);
    }

    public function list_config_files()
    {
        $paths = $this->fly_system->listContents('./', true);
        
        $valid_paths = array_filter($paths, function($path){
            if ($path['type'] == 'dir') {
                return false;
            }
            return ($path['basename'] == 'vos.yaml');
        });
        
        return array_map(function($path) {
            return $path['path'];
        }, $valid_paths);
    }
}
