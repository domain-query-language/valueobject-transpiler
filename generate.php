<?php

require "./vendor/autoload.php";

$base_folder = $argv[1];

$fly_system = new \League\Flysystem\Adapter\Local($base_folder);
$file_system = new \Adapter\FileSystem($fly_system);

$reflector = new \EventSourced\ValueObject\Reflector\Reflector();
$serializer = new \EventSourced\ValueObject\Serializer\Serializer($reflector);
$templater = new \League\Plates\Engine(__DIR__."/src/Adapter/TemplateOutputAdapter/templates");
$output_adapter = new \Adapter\PHPTemplateOutputAdapter(
    $serializer, 
    $templater,   
    $file_system
);

$schema_factory = new \Controller\SchemaFactory($file_system);

$controller = new \Controller\FileSystemScannerController($schema_factory, $output_adapter, $file_system);

$controller->generate('./');

