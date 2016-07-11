<?php

require "./vendor/autoload.php";

function dd($value) {
    var_dump($value);
}

$reflector = new \EventSourced\ValueObject\Reflector\Reflector();
$serializer = new \EventSourced\ValueObject\Serializer\Serializer($reflector);
$templater = new \League\Plates\Engine(__DIR__."/src/Adapter/TemplateOutputAdapter/templates");

$input_file = $argv[1];
$input_data = 
$path = explode("/", $input_file);
array_pop($path);
$output_directory = __DIR__."/".implode("/", $path);
$output_namespace = $argv[2];

$output_file_system = new \Adapter\LocalFileSystem($output_directory);
$output_adapter = new \Adapter\TemplateOutputAdapter($serializer, $templater, $output_file_system, $output_namespace);

$generator = new \App\Generator\Generator($output_adapter);

$input_file_system = new \Adapter\LocalFileSystem(__DIR__);
$controller = new \Controller\YamlFileController($input_file_system, $generator);

$controller->generate($input_file);

