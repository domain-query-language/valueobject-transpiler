<?php namespace Test\Acceptance;

class EventTest extends AbstractTestCase
{
    protected function yaml_config()
    {
        return "
event\ProductCreated:
  product: entity\Product
        ";
    }

}