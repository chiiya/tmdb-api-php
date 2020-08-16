<?php

namespace Chiiya\Tmdb\Models\Person;

use Chiiya\Tmdb\Models\Entity;

class TranslationData extends Entity
{
    private string $biography;

    public function getBiography(): string
    {
        return $this->biography;
    }

    public function setBiography(string $biography): void
    {
        $this->biography = $biography;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'biography' => $this->getBiography(),
        ];
    }
}
