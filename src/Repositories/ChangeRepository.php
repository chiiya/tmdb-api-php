<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Responses\ChangesResponse;

class ChangeRepository extends AbstractRepository
{
    /**
     * Get a list of all of the movie ids that have been changed in the past 24 hours.
     *
     * You can query it for up to 14 days worth of changed IDs at a time with the
     * start_date and end_date query parameters. 100 items are returned per page.
     *
     * @see https://developers.themoviedb.org/3/changes/get-movie-change-list
     */
    public function getMovieChanges(array $parameters = []): ChangesResponse
    {
        return $this->serializer->denormalize($this->getResource()->getMovieChanges($parameters), ChangesResponse::class);
    }

    /**
     * Get a list of all of the TV show ids that have been changed in the past 24 hours.
     *
     * You can query it for up to 14 days worth of changed IDs at a time with the
     * start_date and end_date query parameters. 100 items are returned per page.
     *
     * @see https://developers.themoviedb.org/3/changes/get-tv-change-list
     */
    public function getTvChanges(array $parameters = []): ChangesResponse
    {
        return $this->serializer->denormalize($this->getResource()->getTvChanges($parameters), ChangesResponse::class);
    }

    /**
     * Get a list of all of the person ids that have been changed in the past 24 hours.
     *
     * You can query it for up to 14 days worth of changed IDs at a time with the
     * start_date and end_date query parameters. 100 items are returned per page.
     *
     * @see https://developers.themoviedb.org/3/changes/get-person-change-list
     */
    public function getPersonChanges(array $parameters = []): ChangesResponse
    {
        return $this->serializer->denormalize($this->getResource()->getPersonChanges($parameters), ChangesResponse::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getResource()
    {
        return $this->getClient()->changes();
    }
}
