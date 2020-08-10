<?php

namespace Chiiya\Tmdb\Models\Configuration;

use Chiiya\Tmdb\Models\Entity;

class Country extends Entity
{
    /** @var string */
    private $iso31661;
    /** @var string */
    private $englishName;

    public function getIso31661(): string
    {
        return $this->iso31661;
    }

    public function setIso31661(string $iso31661): Country
    {
        $this->iso31661 = $iso31661;

        return $this;
    }

    public function getEnglishName(): string
    {
        return $this->englishName;
    }

    public function setEnglishName(string $englishName): Country
    {
        $this->englishName = $englishName;

        return $this;
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
