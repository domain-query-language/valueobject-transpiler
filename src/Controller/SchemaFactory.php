<?php namespace Controller;

use App\Generator\FileSystem;
use Symfony\Component\Yaml\Yaml;
use Domain\Generator\ValueObject;

class SchemaFactory
{
    private $file_system;
    
    public function __construct(FileSystem $file_system)
    {
        $this->file_system = $file_system;
    }
    
    public function yaml_file($input_file)
    {
        $schema_yaml = $this->file_system->fetch($input_file);
        $schema_trees = Yaml::parse($schema_yaml);
        $schemas = $this->translate_trees_into_schemas($schema_trees);
        return $schemas;
    }
    
    private function translate_trees_into_schemas($trees)
    {
        $schemas = [];
        foreach ($trees as $id_string=>$value) {
            $id = $this->make_id($id_string);
            
            $schema = null;
            if (is_string($value)) {
                $validators = $this->make_validators($value);
                $schema = new ValueObject\Schema\Value($id, $validators);
            } else {
                $properties = $this->make_properties($value);
                $schema = new ValueObject\Schema\Composite($id, $properties);
            }
            
            $schemas[] = new ValueObject\Schema($schema);
        }
                
        return new ValueObject\Schemas($schemas);
    }
    
    private function make_id($id_string)
    {
        list($type_string, $name_string) = explode("\\", $id_string);
        $name = new ValueObject\Name($name_string);
        $type = new ValueObject\Type($type_string);
        return new ValueObject\ID($type, $name);
    }
       
    private function make_validators($validator_string)
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
    
    private function make_properties($values)
    {
        $properties = [];
        foreach ($values as $key=>$value) {
            $properties[] = new ValueObject\Property(
                new ValueObject\Name($key), 
                $this->make_id($value)
            );
        }
        return new ValueObject\Properties($properties);
    }
}