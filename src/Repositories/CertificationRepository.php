<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Factories\CertificationFactory;
use Chiiya\Tmdb\Models\CertificationList;
use Chiiya\Tmdb\Resources\Certifications;

class CertificationRepository extends AbstractRepository
{
    /**
     * Get an up to date list of the officially supported movie certifications on TMDb.
     *
     * @see https://developers.themoviedb.org/3/certifications/get-movie-certifications
     *
     * @return CertificationList[]
     */
    public function getMovieCertifications(array $parameters = []): array
    {
        return $this->getFactory()->createCollection($this->getResource()->getMovieCertifications($parameters));
    }

    /**
     * Get an up to date list of the officially supported TV show certifications on TMDb.
     *
     * @see https://developers.themoviedb.org/3/certifications/get-tv-certifications
     *
     * @return CertificationList[]
     */
    public function getTvCertifications(array $parameters = []): array
    {
        return $this->getFactory()->createCollection($this->getResource()->getTvCertifications($parameters));
    }

    /**
     * Return the model factory.
     */
    protected function getFactory(): CertificationFactory
    {
        return new CertificationFactory();
    }

    /**
     * Return the model api client.
     */
    protected function getResource(): Certifications
    {
        return $this->getClient()->certifications();
    }
}
