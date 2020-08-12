<?php

namespace Chiiya\Tmdb\Models;

abstract class AbstractTranslation extends Entity
{
    /** @var string */
    private $iso31661;
    /** @var string */
    private $iso6391;
    /** @var string */
    private $name;
    /** @var string */
    private $englishName;

    public function getIso31661(): string
    {
        return $this->iso31661;
    }

    public function setIso31661(string $iso31661): AbstractTranslation
    {
        $this->iso31661 = $iso31661;

        return $this;
    }

    public function getIso6391(): string
    {
        return $this->iso6391;
    }

    public function setIso6391(string $iso6391): AbstractTranslation
    {
        $this->iso6391 = $iso6391;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): AbstractTranslation
    {
        $this->name = $name;

        return $this;
    }

    public function getEnglishName(): string
    {
        return $this->englishName;
    }

    public function setEnglishName(string $englishName): AbstractTranslation
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
            'iso_639_1' => $this->getIso6391(),
            'name' => $this->getName(),
            'english_name' => $this->getEnglishName(),
        ];
    }
}
