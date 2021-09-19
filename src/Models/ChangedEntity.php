<?php

namespace Chiiya\Tmdb\Models;

class ChangedEntity extends Entity
{
    private int $id;
    private ?bool $adult;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getAdult(): ?bool
    {
        return $this->adult;
    }

    public function setAdult(?bool $adult): void
    {
        $this->adult = $adult;
    }
}
