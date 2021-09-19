<?php

namespace Chiiya\Tmdb\Common;

use InvalidArgumentException;

trait HasAttributes
{
    /**
     * Set specified attribute with the given value.
     */
    protected function setAttribute(string $key, mixed $value): void
    {
        if (!$this->hasSetterForAttribute($key)) {
            throw new InvalidArgumentException('Unknown attribute: '.$key);
        }
        $this->callSetterForAttribute($key, $value);
    }

    /**
     * Check whether the model has a setter for the specified attribute.
     */
    protected function hasSetterForAttribute(string $key): bool
    {
        return method_exists($this, 'set'.StringHelper::studly($key));
    }

    /**
     * Call the setter for a specified attribute with the given value.
     */
    protected function callSetterForAttribute(string $key, mixed $value): void
    {
        $this->{'set'.StringHelper::studly($key)}($value);
    }
}
