<?php

require "./vendor/autoload.php";

function dd($value) {
    var_dump($value);
}

$input_file = $argv[1];
$input_file_system = new \Adapter\LocalFileSystem(__DIR__);
$input_adapter = new \Adapter\YamlInputAdapter($input_file_system, $input_file);

$reflector = new \EventSourced\ValueObject\Reflector\Reflector();
$serializer = new \EventSourced\ValueObject\Serializer\Serializer($reflector);
$templater = new \League\Plates\Engine(__DIR__."/src/Adapter/TemplateOutputAdapter/templates");

$path = explode("/", $input_file);
array_pop($path);
$output_directory = __DIR__."/".implode("/", $path);

$output_file_system = new \Adapter\LocalFileSystem($output_directory);
$output_adapter = new \Adapter\TemplateOutputAdapter($serializer, $templater, $output_file_system);

$generator = new \App\Generator\Generator($input_adapter, $output_adapter);
$generator->run();

