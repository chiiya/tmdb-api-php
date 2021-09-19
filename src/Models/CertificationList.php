<?php

namespace Chiiya\Tmdb\Models;

class CertificationList extends Entity
{
    private string $country;
    /** @var Certification[] */
    private array $certifications = [];

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return Certification[]
     */
    public function getCertifications(): array
    {
        return $this->certifications;
    }

    /**
     * @param Certification[] $certifications
     */
    public function setCertifications(array $certifications): void
    {
        $this->certifications = $certifications;
    }
}
