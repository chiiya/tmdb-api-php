<?php

namespace Chiiya\Tmdb\Models\Configuration;

use Chiiya\Tmdb\Models\Entity;

class Language extends Entity
{
    private string $iso6391;
    private string $englishName;
    private string $name;

    public function getIso6391(): string
    {
        return $this->iso6391;
    }

    public function setIso6391(string $iso6391): void
    {
        $this->iso6391 = $iso6391;
    }

    public function getEnglishName(): string
    {
        return $this->englishName;
    }

    public function setEnglishName(string $englishName): void
    {
        $this->englishName = $englishName;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'iso_639_1' => $this->getIso6391(),
            'english_name' => $this->getEnglishName(),
            'name' => $this->getName(),
        ];
    }
}
