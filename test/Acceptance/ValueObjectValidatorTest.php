<?php namespace Test\Acceptance;

class ValueObjectValidatorTest extends AbstractTestCase
{
    protected function yaml_config()
    {
        return "
value\Coordinate: is floatVal and between -90,90       
        ";
    }

}