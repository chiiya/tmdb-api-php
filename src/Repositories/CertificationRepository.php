<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Factories\CertificationFactory;
use Chiiya\Tmdb\Models\CertificationList;
use Chiiya\Tmdb\Resources\Certifications;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class CertificationRepository extends AbstractRepository
{
    /**
     * Get an up-to-date list of the officially supported movie certifications on TMDb.
     *
     * @see https://developers.themoviedb.org/3/certifications/get-movie-certifications
     * @return CertificationList[]
     * @throws ExceptionInterface
     * @throws GuzzleException
     */
    public function getMovieCertifications(array $parameters = []): array
    {
        return $this->getFactory()->createCollection($this->getResource()->getMovieCertifications($parameters));
    }

    /**
     * Get an up-to-date list of the officially supported TV show certifications on TMDb.
     *
     * @see https://developers.themoviedb.org/3/certifications/get-tv-certifications
     * @return CertificationList[]
     * @throws GuzzleException
     * @throws ExceptionInterface
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
        return new CertificationFactory($this->serializer);
    }

    /**
     * Return the model api client.
     */
    protected function getResource(): Certifications
    {
        return $this->getClient()->certifications();
    }
}
