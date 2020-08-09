<?php

namespace Chiiya\Tmdb\Models;

use Chiiya\Tmdb\Models\Image\LogoImage;

class Company extends Entity
{
    /** @var int */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string|null */
    private $logoPath;
    /** @var string */
    private $headquarters;
    /** @var string */
    private $homepage;
    /** @var string|null */
    private $originCountry;
    /** @var AlternativeName[]|null */
    private $alternativeNames;
    /** @var LogoImage[]|null */
    private $logos;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Company
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Company
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Company
    {
        $this->description = $description;

        return $this;
    }

    public function getLogoPath(): ?string
    {
        return $this->logoPath;
    }

    public function setLogoPath(?string $logoPath): Company
    {
        $this->logoPath = $logoPath;

        return $this;
    }

    public function getHeadquarters(): string
    {
        return $this->headquarters;
    }

    public function setHeadquarters(string $headquarters): Company
    {
        $this->headquarters = $headquarters;

        return $this;
    }

    public function getHomepage(): string
    {
        return $this->homepage;
    }

    public function setHomepage(string $homepage): Company
    {
        $this->homepage = $homepage;

        return $this;
    }

    public function getOriginCountry(): ?string
    {
        return $this->originCountry;
    }

    public function setOriginCountry(?string $originCountry): Company
    {
        $this->originCountry = $originCountry;

        return $this;
    }

    /**
     * @return AlternativeName[]|null
     */
    public function getAlternativeNames(): ?array
    {
        return $this->alternativeNames;
    }

    /**
     * @param AlternativeName[] $alternativeNames
     */
    public function setAlternativeNames(array $alternativeNames): Company
    {
        $this->alternativeNames = [];
        foreach ($alternativeNames as $alternativeName) {
            $this->addAlternativeName($alternativeName);
        }

        return $this;
    }

    public function addAlternativeName(AlternativeName $alternativeName): Company
    {
        $this->alternativeNames[] = $alternativeName;

        return $this;
    }

    /**
     * @return LogoImage[]|null
     */
    public function getLogos(): ?array
    {
        return $this->logos;
    }

    /**
     * @param LogoImage[] $logos
     */
    public function setLogos(array $logos): Company
    {
        $this->logos = [];
        foreach ($logos as $logo) {
            $this->addLogo($logo);
        }

        return $this;
    }

    public function addLogo(LogoImage $logo): Company
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
            'description' => $this->getDescription(),
            'logo_path' => $this->getLogoPath(),
            'headquarters' => $this->getHeadquarters(),
            'homepage' => $this->getHomepage(),
            'origin_country' => $this->getOriginCountry(),
            'alternative_names' => $this->getAlternativeNames(),
            'logos' => $this->getLogos(),
        ];
    }
}
