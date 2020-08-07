<?php

namespace Chiiya\Tmdb\Models;

trait SerializesToJson
{
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
}
