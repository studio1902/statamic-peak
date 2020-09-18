<?php

namespace App\Modifiers;

use Illuminate\Support\Str;
use Statamic\Modifiers\Modifier;

class IsLocalUrl extends Modifier
{
    /**
     * Modify a value.
     *
     * @param mixed  $value    The value to be modified
     * @param array  $params   Any parameters used in the modifier
     * @param array  $context  Contextual values
     * @return mixed
     */
    public function index($value, $params, $context)
    {
        if (Str::startsWith($value, 'http')) {
            return Str::contains($value, request()->root());
        }
        return true;
    }
}