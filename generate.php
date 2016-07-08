<?php

require "./vendor/autoload.php";

$input_file = __DIR__."/".argv[1];

$file_system = new \Adapter\LocalFileSystem();
$input_adapter = new \Adapter\YamlInputAdapter($file_system);

$reflector = new \EventSourced\ValueObject\Reflector\Reflector();
$serializer = new \EventSourced\ValueObject\Serializer\Serializer($reflector);
$templater = new \League\Plates\Engine("/Users/barryosullivan/Code/valueobject-transpiler/src/Adapter/TemplateOutputAdapter/templates");
$output_adapter = new \Adapter\TemplateOutputAdapter($serializer, $templater, $file_system);

$generator = new \App\Generator\Generator($input_adapter, $output_adapter);
$generator->run();

