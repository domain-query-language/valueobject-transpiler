<?php namespace Test\Acceptance;

class ValueObjectCompositeTest extends AbstractTestCase
{
    protected function class_name()
    {
        return "Quantity";
    }

    protected function yaml_config()
    {
        return "
value\Quantity: 
    min: value\Integer
    max: value\Integer
        ";
    }

}