<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Common\Collection;
use Chiiya\Tmdb\Factories\CertificationFactory;
use Chiiya\Tmdb\Factories\FactoryInterface;
use Chiiya\Tmdb\Resources\Certifications;

class CertificationRepository extends AbstractRepository
{
    /**
     * Get an up to date list of the officially supported movie certifications on TMDb.
     * @see https://developers.themoviedb.org/3/certifications/get-movie-certifications
     * @param array $parameters
     * @return Collection
     */
    public function getMovieCertifications(array $parameters = []): Collection
    {
        return $this->getFactory()->createCollection($this->getResource()->getMovieCertifications($parameters));
    }

    /**
     * Get an up to date list of the officially supported TV show certifications on TMDb.
     * @see https://developers.themoviedb.org/3/certifications/get-tv-certifications
     * @param array $parameters
     * @return Collection
     */
    public function getTvCertifications(array $parameters = []): Collection
    {
        return $this->getFactory()->createCollection($this->getResource()->getTvCertifications($parameters));
    }

    /**
     * Return the model factory.
     *
     * @return FactoryInterface
     */
    protected function getFactory(): FactoryInterface
    {
        return new CertificationFactory();
    }

    /**
     * Return the model api client.
     *
     * @return Certifications
     */
    protected function getResource(): Certifications
    {
        return $this->getClient()->certifications();
    }
}
