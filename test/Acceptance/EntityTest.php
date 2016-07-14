<?php namespace Test\Acceptance;

class EntityTest extends AbstractTestCase
{
    protected function yaml_config()
    {
        return "
entity\Person: 
    id: value\Integer
    age: value\Integer
        ";
    }

}