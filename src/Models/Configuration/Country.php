<?php

namespace Chiiya\Tmdb\Models\Configuration;

use Chiiya\Tmdb\Models\Entity;

class Country extends Entity
{
    private string $iso31661;
    private string $englishName;

    public function getIso31661(): string
    {
        return $this->iso31661;
    }

    public function setIso31661(string $iso31661): void
    {
        $this->iso31661 = $iso31661;
    }

    public function getEnglishName(): string
    {
        return $this->englishName;
    }

    public function setEnglishName(string $englishName): void
    {
        $this->englishName = $englishName;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'iso_3166_1' => $this->getIso31661(),
            'english_name' => $this->getEnglishName(),
        ];
    }
}
