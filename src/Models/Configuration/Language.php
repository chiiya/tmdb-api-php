<?php

namespace Chiiya\Tmdb\Models\Configuration;

use Chiiya\Tmdb\Models\Entity;

class Language extends Entity
{
    /** @var string */
    private $iso6391;
    /** @var string */
    private $englishName;
    /** @var string */
    private $name;

    public function getIso6391(): string
    {
        return $this->iso6391;
    }

    public function setIso6391(string $iso6391): Language
    {
        $this->iso6391 = $iso6391;

        return $this;
    }

    public function getEnglishName(): string
    {
        return $this->englishName;
    }

    public function setEnglishName(string $englishName): Language
    {
        $this->englishName = $englishName;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Language
    {
        $this->name = $name;

        return $this;
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
