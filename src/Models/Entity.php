<?php

namespace Chiiya\Tmdb\Models;

use Chiiya\Tmdb\Common\Arrayable;
use Chiiya\Tmdb\Common\HasAttributes;

abstract class Entity implements \JsonSerializable, Arrayable
{
    use SerializesToJson;
    use HasAttributes;

    /**
     * Entity constructor.
     */
    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }
    }

    /**
     * Convert the model instance to an array.
     */
    abstract public function toArray(): array;
}
