<?php namespace App\Generator;

interface FileSystem
{
    public function store($filename, $data);
    
    public function fetch($file_path);
    
    public function list_config_files();
}