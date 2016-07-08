<?php namespace Test\EndToEndTest;

use App\Generator\FileSystem;
use Symfony\Component\Yaml\Yaml;
use Domain\Generator\ValueObject;

class FakeInputAdapter implements \App\Generator\InputAdapter
{
    private $file_system;
    
    public function __construct(FileSystem $file_system)
    {
        $this->file_system = $file_system;
    }
    
    public function load_schemas()
    {
        $schema_yaml = $this->file_system->fetch("./valueobjects.yml");
        $schema_trees = Yaml::parse($schema_yaml);
        return $this->translate_trees_into_schemas($schema_trees);
    }
    
    private function translate_trees_into_schemas($trees)
    {
        $schemas = [];
        foreach ($trees as $key_string=>$validator_string) {
            list($type_string, $name_string) = explode("\\", $key_string);
            $name = new ValueObject\Name($name_string);
            $type = new ValueObject\Type($type_string);
            $validators = $this->make_validator($validator_string);
            $schemas[] = new ValueObject\Schema($name, $type, $validators);
        }
                
        return new ValueObject\Schemas($schemas);
    }
    
    private function make_validator($validator_string)
    {
        $parts = array_filter(explode(" ", $validator_string));
        $is = array_shift($parts);
        
        //Turn into tree
        $tree = [];
        $node = [];
        foreach ($parts as $part) {
            if ($part == "and") {
                $tree[] = $node;
                $node = [];
            } else {
                $node[] = $part;
            }
        }
        $tree[] = $node;
        
        $validators = [];
        
        foreach ($tree as $validator_tree) {
            $name_string = $validator_tree[0];
            $arguments_string = isset($validator_tree[1]) ? $validator_tree[1]: null;
            $validators[] = new ValueObject\Validator(
                new ValueObject\Name($name_string),
                $this->make_arguments($arguments_string)
            );
        }
        
        return new ValueObject\Validators($validators);
    }
    
    private function make_arguments($arguments_string)
    {
        if (!$arguments_string) {
            return new ValueObject\Arguments([]);
        }
        $arg_parts = explode(",", $arguments_string);
        $args = array_map(function($arg_string) {
            return new ValueObject\Argument($arg_string);
        }, $arg_parts);
        
        return new ValueObject\Arguments($args);
    }
}