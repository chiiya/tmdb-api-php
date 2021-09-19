<?php

namespace Chiiya\Tmdb\Resources;

use GuzzleHttp\Exception\GuzzleException;

class Changes extends AbstractResource
{
    /**
     * Get a list of all the movie ids that have been changed in the past 24 hours.
     *
     * You can query it for up to 14 days worth of changed IDs at a time with the
     * start_date and end_date query parameters. 100 items are returned per page.
     *
     * @see https://developers.themoviedb.org/3/changes/get-movie-change-list
     * @throws GuzzleException
     */
    public function getMovieChanges(array $parameters = []): array
    {
        return $this->get('movie/changes', $parameters);
    }

    /**
     * Get a list of all the TV show ids that have been changed in the past 24 hours.
     *
     * You can query it for up to 14 days worth of changed IDs at a time with the
     * start_date and end_date query parameters. 100 items are returned per page.
     *
     * @see https://developers.themoviedb.org/3/changes/get-tv-change-list
     * @throws GuzzleException
     */
    public function getTvChanges(array $parameters = []): array
    {
        return $this->get('tv/changes', $parameters);
    }

    /**
     * Get a list of all the person ids that have been changed in the past 24 hours.
     *
     * You can query it for up to 14 days worth of changed IDs at a time with the
     * start_date and end_date query parameters. 100 items are returned per page.
     *
     * @see https://developers.themoviedb.org/3/changes/get-person-change-list
     * @throws GuzzleException
     */
    public function getPersonChanges(array $parameters = []): array
    {
        return $this->get('person/changes', $parameters);
    }
}
