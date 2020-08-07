<?php

namespace Chiiya\Tmdb\Models;

trait SerializesToJson
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->jsonSerialize();
    }

    /**
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    /**
     * @return string
     */
    public function jsonSerialize(): string
    {
        return $this->toJson();
    }
}
