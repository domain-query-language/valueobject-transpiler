<?php namespace App\Generator;

use Domain\Generator\ValueObject\Schemas;

interface InputAdapter
{
    /** @return Schemas */
    public function load_schemas();
}