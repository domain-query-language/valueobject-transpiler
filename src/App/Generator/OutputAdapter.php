<?php namespace App\Generator;

use Domain\Generator\Schemas;

interface OutputAdapter
{
    public function store_schemas(Schemas $schemas);
}