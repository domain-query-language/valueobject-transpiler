<?php namespace Test\Acceptance;

class ValueObjectCompositeTest extends AbstractTestCase
{
    protected function yaml_config()
    {
        return "
value\Quantity: 
    min: value\Integer
    max: value\Integer
        ";
    }

}