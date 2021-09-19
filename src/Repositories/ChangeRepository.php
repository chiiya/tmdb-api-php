<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Resources\Changes;
use Chiiya\Tmdb\Responses\ChangesResponse;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class ChangeRepository extends AbstractRepository
{
    /**
     * Get a list of all the movie ids that have been changed in the past 24 hours.
     *
     * You can query it for up to 14 days worth of changed IDs at a time with the
     * start_date and end_date query parameters. 100 items are returned per page.
     *
     * @see https://developers.themoviedb.org/3/changes/get-movie-change-list
     * @throws GuzzleException
     * @throws ExceptionInterface
     */
    public function getMovieChanges(array $parameters = []): ChangesResponse
    {
        return $this->serializer->denormalize($this->getResource()->getMovieChanges($parameters), ChangesResponse::class);
    }

    /**
     * Get a list of all the TV show ids that have been changed in the past 24 hours.
     *
     * You can query it for up to 14 days worth of changed IDs at a time with the
     * start_date and end_date query parameters. 100 items are returned per page.
     *
     * @see https://developers.themoviedb.org/3/changes/get-tv-change-list
     * @throws GuzzleException
     * @throws ExceptionInterface
     */
    public function getTvChanges(array $parameters = []): ChangesResponse
    {
        return $this->serializer->denormalize($this->getResource()->getTvChanges($parameters), ChangesResponse::class);
    }

    /**
     * Get a list of all the person ids that have been changed in the past 24 hours.
     *
     * You can query it for up to 14 days worth of changed IDs at a time with the
     * start_date and end_date query parameters. 100 items are returned per page.
     *
     * @see https://developers.themoviedb.org/3/changes/get-person-change-list
     * @throws GuzzleException
     * @throws ExceptionInterface
     */
    public function getPersonChanges(array $parameters = []): ChangesResponse
    {
        return $this->serializer->denormalize($this->getResource()->getPersonChanges($parameters), ChangesResponse::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getResource(): Changes
    {
        return $this->getClient()->changes();
    }
}
