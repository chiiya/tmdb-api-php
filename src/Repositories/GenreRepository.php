<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Models\Genre;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class GenreRepository extends AbstractRepository
{
    /**
     * Get the list of official genres for movies.
     *
     * @see https://developers.themoviedb.org/3/genres/get-movie-list
     *
     * @throws ExceptionInterface
     *
     * @return Genre[]
     */
    public function getMovieGenres(array $parameters = []): array
    {
        $response = $this->getResource()->getMovieGenres($parameters)['genres'] ?? [];

        return $this->serializer->denormalize($response, 'Chiiya\Tmdb\Models\Genre[]');
    }

    /**
     * Get the list of official genres for TV shows.
     *
     * @see https://developers.themoviedb.org/3/genres/get-tv-list
     *
     * @throws ExceptionInterface
     *
     * @return Genre[]
     */
    public function getTvGenres(array $parameters = []): array
    {
        $response = $this->getResource()->getTvGenres($parameters)['genres'] ?? [];

        return $this->serializer->denormalize($response, 'Chiiya\Tmdb\Models\Genre[]');
    }

    /**
     * {@inheritdoc}
     */
    protected function getResource()
    {
        return $this->getClient()->genres();
    }
}
