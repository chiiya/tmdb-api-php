<?php

namespace Chiiya\Tmdb\Models;

class Translation extends Entity
{
    /** @var string */
    private $iso31661;
    /** @var string */
    private $iso6391;
    /** @var string */
    private $name;
    /** @var string */
    private $englishName;
    /** @var TranslationData */
    private $data;

    public function getIso31661(): string
    {
        return $this->iso31661;
    }

    public function setIso31661(string $iso31661): Translation
    {
        $this->iso31661 = $iso31661;

        return $this;
    }

    public function getIso6391(): string
    {
        return $this->iso6391;
    }

    public function setIso6391(string $iso6391): Translation
    {
        $this->iso6391 = $iso6391;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Translation
    {
        $this->name = $name;

        return $this;
    }

    public function getEnglishName(): string
    {
        return $this->englishName;
    }

    public function setEnglishName(string $englishName): Translation
    {
        $this->englishName = $englishName;

        return $this;
    }

    public function getData(): TranslationData
    {
        return $this->data;
    }

    public function setData(TranslationData $data): Translation
    {
        $this->data = $data;

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
            'data' => $this->getData()->toArray(),
        ];
    }
}
