<?php

namespace Chiiya\Tmdb\Models\Person;

use Chiiya\Tmdb\Models\Entity;

abstract class Credit extends Entity
{
    /** @var string */
    protected string $creditId;

    public function getCreditId(): string
    {
        return $this->creditId;
    }

    public function setCreditId(string $creditId): void
    {
        $this->creditId = $creditId;
    }

    abstract protected function getMediaAttributes(): array;
}
