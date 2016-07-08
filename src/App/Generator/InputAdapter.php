<?php namespace App\Generator;

use Domain\Generator\Schemas;

interface InputAdapter
{
    /** @return Schemas */
    public function load_schemas();
}