<?php

namespace Chiiya\Tmdb\Models\Configuration;

use Chiiya\Tmdb\Models\Entity;

class ImageConfiguration extends Entity
{
    private string $baseUrl;
    private string $secureBaseUrl;
    /** @var string[] */
    private array $backdropSizes;
    /** @var string[] */
    private array $logoSizes;
    /** @var string[] */
    private array $posterSizes;
    /** @var string[] */
    private array $profileSizes;
    /** @var string[] */
    private array $stillSizes;

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function setBaseUrl(string $baseUrl): void
    {
        $this->baseUrl = $baseUrl;
    }

    public function getSecureBaseUrl(): string
    {
        return $this->secureBaseUrl;
    }

    public function setSecureBaseUrl(string $secureBaseUrl): void
    {
        $this->secureBaseUrl = $secureBaseUrl;
    }

    /**
     * @return string[]
     */
    public function getBackdropSizes(): array
    {
        return $this->backdropSizes;
    }

    /**
     * @param string[] $backdropSizes
     */
    public function setBackdropSizes(array $backdropSizes): void
    {
        $this->backdropSizes = $backdropSizes;
    }

    /**
     * @return string[]
     */
    public function getLogoSizes(): array
    {
        return $this->logoSizes;
    }

    /**
     * @param string[] $logoSizes
     */
    public function setLogoSizes(array $logoSizes): void
    {
        $this->logoSizes = $logoSizes;
    }

    /**
     * @return string[]
     */
    public function getPosterSizes(): array
    {
        return $this->posterSizes;
    }

    /**
     * @param string[] $posterSizes
     */
    public function setPosterSizes(array $posterSizes): void
    {
        $this->posterSizes = $posterSizes;
    }

    /**
     * @return string[]
     */
    public function getProfileSizes(): array
    {
        return $this->profileSizes;
    }

    /**
     * @param string[] $profileSizes
     */
    public function setProfileSizes(array $profileSizes): void
    {
        $this->profileSizes = $profileSizes;
    }

    /**
     * @return string[]
     */
    public function getStillSizes(): array
    {
        return $this->stillSizes;
    }

    /**
     * @param string[] $stillSizes
     */
    public function setStillSizes(array $stillSizes): void
    {
        $this->stillSizes = $stillSizes;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'base_url' => $this->getBaseUrl(),
            'secure_base_url' => $this->getSecureBaseUrl(),
            'backdrop_sizes' => $this->getBackdropSizes(),
            'logo_sizes' => $this->getLogoSizes(),
            'poster_sizes' => $this->getPosterSizes(),
            'profile_sizes' => $this->getProfileSizes(),
            'still_sizes' => $this->getStillSizes(),
        ];
    }
}
