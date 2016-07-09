<?php namespace Adapter;

use App\Generator\FileSystem;
use Symfony\Component\Yaml\Yaml;
use Domain\Generator\ValueObject;

class YamlInputAdapter implements \App\Generator\InputAdapter
{
    private $file_system;
    private $input_file;
    
    public function __construct(FileSystem $file_system, $input_file="./valueobjects.yml")
    {
        $this->file_system = $file_system;
        $this->input_file = $input_file;
    }
    
    public function load_schemas()
    {
        $schema_yaml = $this->file_system->fetch($this->input_file);
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
        $conditon_asts = $this->parse_conditions($validator_string);
        
        $validators = [];
        
        foreach ($conditon_asts as $conditon_ast) {
            $validators[] = new ValueObject\Validator(
                new ValueObject\Name($conditon_ast->validator_name),
                $this->make_arguments($conditon_ast->validator_arguments)
            );
        }
        
        return new ValueObject\Validators($validators);
    }
    
    private function parse_conditions($validator_string)
    {
        $conditions = explode("and", substr($validator_string, 3));   
        //Turn into tree
        $ast_tree = [];
        foreach ($conditions as $condition_string) {
            $condition = new \stdClass();
            $parts = array_values(array_filter(explode(" ", $condition_string)));
            $condition->validator_name = $parts[0];
            $condition->validator_arguments = isset($parts[1]) ? $parts[1]: null;
            $ast_tree[] = $condition;
        }
        
        return $ast_tree;
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