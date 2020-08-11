<?php

namespace Chiiya\Tmdb\Resources;

class Genres extends AbstractResource
{
    /**
     * Get the list of official genres for movies.
     *
     * @see https://developers.themoviedb.org/3/genres/get-movie-list
     */
    public function getMovieGenres(array $parameters = []): array
    {
        return $this->get('genre/movie/list', $parameters);
    }

    /**
     * Get the list of official genres for TV shows.
     *
     * @see https://developers.themoviedb.org/3/genres/get-tv-list
     */
    public function getTvGenres(array $parameters = []): array
    {
        return $this->get('genre/tv/list', $parameters);
    }
}
