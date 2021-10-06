<?php

namespace App\Tags;

use Statamic\Tags\Tags;

class ScopeValue extends Tags
{
    public function index()
    {
        $variableName = $this->params->get('var');

        $contextValue = $this->context->value($variableName);

        if (is_array($contextValue)) {
            return $this->parseLoop($contextValue);
        }

        if ($this->isPair) {
            $as = $this->params->get('as', 'value');

            return $this->parse(array_merge([$as => $contextValue], $this->context->all()));
        }

        return $contextValue;
    }
}
