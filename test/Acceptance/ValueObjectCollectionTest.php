<?php namespace Test\Acceptance;

class ValueObjectCollectionTest extends AbstractTestCase
{
    protected function yaml_config()
    {
        return "value\Integers: contains value\Integer";
    }
}