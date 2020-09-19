<?php

namespace Chiiya\Tmdb\Resources;

class Keywords extends AbstractResource
{
    /**
     * Get details for a given keyword.
     *
     * @see https://developers.themoviedb.org/3/keywords/get-keyword-details
     *
     * @param string|int $id
     */
    public function getKeyword($id, array $parameters = []): array
    {
        return $this->get("keyword/$id", $parameters);
    }

    /**
     * Get the movies that belong to a keyword.
     *
     * @see https://developers.themoviedb.org/3/keywords/get-movies-by-keyword
     *
     * @param string|int $id
     */
    public function getMovies($id, array $parameters = []): array
    {
        return $this->get("keyword/$id/movies", $parameters);
    }
}
