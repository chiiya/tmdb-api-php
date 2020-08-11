<?php

namespace Chiiya\Tmdb\Models;

use Chiiya\Tmdb\Models\Image\LogoImage;

class Network extends Entity
{
    /** @var int */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $originCountry;
    /** @var string */
    private $headquarters;
    /** @var string */
    private $homepage;
    /** @var AlternativeName[]|null */
    private $alternativeNames;
    /** @var LogoImage[]|null */
    private $logos;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Network
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Network
    {
        $this->name = $name;

        return $this;
    }

    public function getOriginCountry(): string
    {
        return $this->originCountry;
    }

    public function setOriginCountry(string $originCountry): Network
    {
        $this->originCountry = $originCountry;

        return $this;
    }

    public function getHeadquarters(): string
    {
        return $this->headquarters;
    }

    public function setHeadquarters(string $headquarters): Network
    {
        $this->headquarters = $headquarters;

        return $this;
    }

    public function getHomepage(): string
    {
        return $this->homepage;
    }

    public function setHomepage(string $homepage): Network
    {
        $this->homepage = $homepage;

        return $this;
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
    public function setAlternativeNames(array $alternativeNames): Network
    {
        $this->alternativeNames = [];
        foreach ($alternativeNames as $alternativeName) {
            $this->addAlternativeName($alternativeName);
        }

        return $this;
    }

    public function addAlternativeName(AlternativeName $alternativeName): Network
    {
        $this->alternativeNames[] = $alternativeName;

        return $this;
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
    public function setLogos(array $logos): Network
    {
        $this->logos = [];
        foreach ($logos as $logo) {
            $this->addLogo($logo);
        }

        return $this;
    }

    public function addLogo(LogoImage $logo): Network
    {
        $this->logos[] = $logo;

        return $this;
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
