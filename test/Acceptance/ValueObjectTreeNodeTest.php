<?php namespace Test\Acceptance;

class ValueObjectTreeNodeTest extends AbstractTestCase
{
    protected function yaml_config()
    {
        return "value\Number: can be value\Integer or value\Double";
    }
}