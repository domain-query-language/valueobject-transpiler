<?php namespace App\Generator;

use Domain\Generator\ValueObject\Schemas;

interface OutputAdapter
{
    public function store_schemas(Schemas $schemas);
}