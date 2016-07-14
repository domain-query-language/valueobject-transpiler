<?php namespace Test\Acceptance;

class ValueObjectCompositeTest extends AbstractTestCase
{
    protected function yaml_config()
    {
        return "value\Integers: contains value\Integer";
    }
}