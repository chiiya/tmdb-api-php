<?php

namespace Chiiya\Tmdb\Models;

use Chiiya\Tmdb\Common\HasAttributes;
use Chiiya\Tmdb\Common\SerializesEntities;
use JsonSerializable;
use Stringable;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Serializer;

abstract class Entity implements JsonSerializable, Stringable
{
    use HasAttributes;
    use SerializesEntities;

    #[Ignore]
    protected Serializer $serializer;

    /**
     * Entity constructor.
     */
    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            $this->setAttribute($key, $value);
        }
        $this->serializer = $this->createSerializer();
    }

    public function __toString(): string
    {
        return $this->jsonSerialize();
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public function jsonSerialize(): string
    {
        return $this->toJson();
    }

    /**
     * Convert the entity instance to an array.
     */
    public function toArray(): array
    {
        return $this->serializer->normalize($this);
    }
}
