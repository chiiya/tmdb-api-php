<?php

namespace Chiiya\Tmdb\Models;

class CertificationList extends Entity
{
    /** @var string */
    private $country;
    /** @var Certification[] */
    private $certifications = [];

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): CertificationList
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Certification[]
     */
    public function getCertifications()
    {
        return $this->certifications;
    }

    /**
     * @param Certification[] $certifications
     */
    public function setCertifications($certifications): CertificationList
    {
        $this->certifications = $certifications;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'country' => $this->getCountry(),
            'certifications' => $this->getCertifications(),
        ];
    }
}
