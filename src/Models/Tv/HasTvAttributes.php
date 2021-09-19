<?php

namespace Chiiya\Tmdb\Models\Tv;

trait HasTvAttributes
{
    private string $name;
    private string $originalName;
    /** @var string[] */
    private array $originCountry;
    private string $firstAirDate;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    public function setOriginalName(string $originalName): void
    {
        $this->originalName = $originalName;
    }

    /**
     * @return string[]
     */
    public function getOriginCountry(): array
    {
        return $this->originCountry;
    }

    /**
     * @param string[] $originCountry
     */
    public function setOriginCountry(array $originCountry): void
    {
        $this->originCountry = $originCountry;
    }

    public function getFirstAirDate(): string
    {
        return $this->firstAirDate;
    }

    public function setFirstAirDate(string $firstAirDate): void
    {
        $this->firstAirDate = $firstAirDate;
    }
}
