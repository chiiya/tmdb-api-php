<?php

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Models\Movie\Movie;

class KeywordMoviesResponse extends PaginatedResponse
{
    /** @var Movie[] */
    private $results = [];

    /**
     * @return Movie[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param Movie[] $results
     */
    public function setResults(array $results): void
    {
        $this->results = [];
        foreach ($results as $result) {
            $this->addResult($result);
        }
    }

    public function addResult(Movie $result): void
    {
        $this->results[] = $result;
    }
}
