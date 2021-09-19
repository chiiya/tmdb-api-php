<?php

namespace Chiiya\Tmdb\Models;

abstract class AbstractTranslation extends Entity
{
    private string $iso31661;
    private string $iso6391;
    private string $name;
    private string $englishName;

    public function getIso31661(): string
    {
        return $this->iso31661;
    }

    public function setIso31661(string $iso31661): void
    {
        $this->iso31661 = $iso31661;
    }

    public function getIso6391(): string
    {
        return $this->iso6391;
    }

    public function setIso6391(string $iso6391): void
    {
        $this->iso6391 = $iso6391;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEnglishName(): string
    {
        return $this->englishName;
    }

    public function setEnglishName(string $englishName): void
    {
        $this->englishName = $englishName;
    }
}
