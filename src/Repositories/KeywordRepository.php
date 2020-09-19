<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Models\Keyword;
use Chiiya\Tmdb\Responses\KeywordMoviesResponse;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class KeywordRepository extends AbstractRepository
{
    /**
     * Get details for a given keyword.
     *
     * @see https://developers.themoviedb.org/3/keywords/get-keyword-details
     *
     * @param string|int $id
     *
     * @throws ExceptionInterface
     */
    public function getKeyword($id, array $parameters = []): Keyword
    {
        $response = $this->getResource()->getKeyword($id, $parameters);

        return $this->serializer->denormalize($response, Keyword::class);
    }

    /**
     * Get the movies that belong to a keyword.
     *
     * @see https://developers.themoviedb.org/3/keywords/get-movies-by-keyword
     *
     * @param string|int $id
     *
     * @throws ExceptionInterface
     */
    public function getMovies($id, array $parameters = []): KeywordMoviesResponse
    {
        $response = $this->getResource()->getMovies($id, $parameters);

        return $this->serializer->denormalize($response, KeywordMoviesResponse::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getResource()
    {
        return $this->getClient()->keywords();
    }
}
