<?php

require "./vendor/autoload.php";

function dd($value) {
    var_dump($value);
}

$base_folder = $argv[1];

$file_system = new \Adapter\FileSystem( 
    new \League\Flysystem\Adapter\Local($base_folder)
);

$reflector = new \EventSourced\ValueObject\Reflector\Reflector();
$serializer = new \EventSourced\ValueObject\Serializer\Serializer($reflector);
$templater = new \League\Plates\Engine("/Users/barryosullivan/Code/valueobject-transpiler/src/Adapter/TemplateOutputAdapter/templates");
$output_adapter = new \Adapter\PHPTemplateOutputAdapter(
    $serializer, 
    $templater,   
    $file_system
);

$schema_factory = new \Controller\SchemaFactory($file_system);

$controller = new \Controller\FileSystemScannerController($schema_factory, $output_adapter, $file_system);

$controller->generate('./');

