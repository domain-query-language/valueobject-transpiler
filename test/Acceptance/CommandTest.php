<?php namespace Test\Acceptance;

class CommandTest extends AbstractTestCase
{
    protected function yaml_config()
    {
        return "
command\CreateProduct:
  product: entity\Product
        ";
    }

}