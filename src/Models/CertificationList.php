<?php

namespace Chiiya\Tmdb\Models;

use Chiiya\Tmdb\Common\Collection;

class CertificationList extends Entity
{
    /** @var string */
    private $country;
    /** @var Certification[]|Collection */
    private $certifications;

    public function __construct()
    {
        $this->certifications = new Collection([]);
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return CertificationList
     */
    public function setCountry(string $country): CertificationList
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return Certification[]|Collection
     */
    public function getCertifications()
    {
        return $this->certifications;
    }

    /**
     * @param Certification[]|Collection $certifications
     * @return CertificationList
     */
    public function setCertifications($certifications): CertificationList
    {
        $this->certifications = $certifications;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'country' => $this->getCountry(),
            'certifications' => $this->getCertifications()->toArray(),
        ];
    }
}
