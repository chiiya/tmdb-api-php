<?php

namespace Chiiya\Tmdb\Models\Configuration;

use Chiiya\Tmdb\Models\Entity;

class ImageConfiguration extends Entity
{
    /** @var string */
    private $baseUrl;
    /** @var string */
    private $secureBaseUrl;
    /** @var string[] */
    private $backdropSizes;
    /** @var string[] */
    private $logoSizes;
    /** @var string[] */
    private $posterSizes;
    /** @var string[] */
    private $profileSizes;
    /** @var string[] */
    private $stillSizes;

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function setBaseUrl(string $baseUrl): ImageConfiguration
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    public function getSecureBaseUrl(): string
    {
        return $this->secureBaseUrl;
    }

    public function setSecureBaseUrl(string $secureBaseUrl): ImageConfiguration
    {
        $this->secureBaseUrl = $secureBaseUrl;

        return $this;
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
    public function setBackdropSizes(array $backdropSizes): ImageConfiguration
    {
        $this->backdropSizes = $backdropSizes;

        return $this;
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
    public function setLogoSizes(array $logoSizes): ImageConfiguration
    {
        $this->logoSizes = $logoSizes;

        return $this;
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
    public function setPosterSizes(array $posterSizes): ImageConfiguration
    {
        $this->posterSizes = $posterSizes;

        return $this;
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
    public function setProfileSizes(array $profileSizes): ImageConfiguration
    {
        $this->profileSizes = $profileSizes;

        return $this;
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
    public function setStillSizes(array $stillSizes): ImageConfiguration
    {
        $this->stillSizes = $stillSizes;

        return $this;
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
