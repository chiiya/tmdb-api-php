<?php

namespace Chiiya\Tmdb\Models;

use Chiiya\Tmdb\Models\Image\LogoImage;

class Network extends Entity
{
    private int $id;
    private string $name;
    private string $originCountry;
    private string $headquarters;
    private string $homepage;
    /** @var AlternativeName[]|null */
    private $alternativeNames;
    /** @var LogoImage[]|null */
    private $logos;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getOriginCountry(): string
    {
        return $this->originCountry;
    }

    public function setOriginCountry(string $originCountry): void
    {
        $this->originCountry = $originCountry;
    }

    public function getHeadquarters(): string
    {
        return $this->headquarters;
    }

    public function setHeadquarters(string $headquarters): void
    {
        $this->headquarters = $headquarters;
    }

    public function getHomepage(): string
    {
        return $this->homepage;
    }

    public function setHomepage(string $homepage): void
    {
        $this->homepage = $homepage;
    }

    /**
     * Available when using append_to_response.
     *
     * @return AlternativeName[]|null
     */
    public function getAlternativeNames(): ?array
    {
        return $this->alternativeNames;
    }

    /**
     * @param AlternativeName[] $alternativeNames
     */
    public function setAlternativeNames(array $alternativeNames): void
    {
        $this->alternativeNames = [];
        foreach ($alternativeNames as $alternativeName) {
            $this->addAlternativeName($alternativeName);
        }
    }

    public function addAlternativeName(AlternativeName $alternativeName): void
    {
        $this->alternativeNames[] = $alternativeName;
    }

    /**
     * Available when using append_to_response.
     *
     * @return LogoImage[]|null
     */
    public function getLogos(): ?array
    {
        return $this->logos;
    }

    /**
     * @param LogoImage[] $logos
     */
    public function setLogos(array $logos): void
    {
        $this->logos = [];
        foreach ($logos as $logo) {
            $this->addLogo($logo);
        }
    }

    public function addLogo(LogoImage $logo): void
    {
        $this->logos[] = $logo;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'origin_country' => $this->getOriginCountry(),
            'headquarters' => $this->getHeadquarters(),
            'homepage' => $this->getHomepage(),
            'alternative_names' => $this->getAlternativeNames(),
            'logos' => $this->getLogos(),
        ];
    }
}
