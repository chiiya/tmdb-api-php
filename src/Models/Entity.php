<?php

namespace Chiiya\Tmdb\Models;

use Chiiya\Tmdb\Common\Arrayable;

abstract class Entity implements \JsonSerializable, Arrayable
{
    use SerializesToJson;

    /**
     * List of properties to populate by the ObjectHydrator.
     *
     * @var array
     */
    public static $properties = [];

    /**
     * Convert the model instance to an array.
     */
    abstract public function toArray(): array;
}
