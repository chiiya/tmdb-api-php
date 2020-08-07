<?php

namespace Chiiya\Tmdb\Common;

use DusanKasan\Knapsack\Collection as BaseCollection;

class Collection extends BaseCollection implements Arrayable
{
    /**
     * Set input of collection.
     */
    public function setInput(array $input): void
    {
        $this->input = new \ArrayIterator($input);
    }

    /**
     * Convert collection to array.
     */
    public function toArray(): array
    {
        return array_map(static function ($value) {
            return $value instanceof Arrayable ? $value->toArray() : $value;
        }, iterator_to_array($this->input));
    }
}
