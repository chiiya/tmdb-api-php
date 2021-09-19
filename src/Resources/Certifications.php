<?php

namespace Chiiya\Tmdb\Resources;

use GuzzleHttp\Exception\GuzzleException;

class Certifications extends AbstractResource
{
    /**
     * Get an up-to-date list of the officially supported movie certifications on TMDb.
     *
     * @see https://developers.themoviedb.org/3/certifications/get-movie-certifications
     * @throws GuzzleException
     */
    public function getMovieCertifications(array $parameters = []): array
    {
        return $this->get('certification/movie/list', $parameters);
    }

    /**
     * Get an up-to-date list of the officially supported TV show certifications on TMDb.
     *
     * @see https://developers.themoviedb.org/3/certifications/get-tv-certifications
     * @throws GuzzleException
     */
    public function getTvCertifications(array $parameters = []): array
    {
        return $this->get('certification/tv/list', $parameters);
    }
}
