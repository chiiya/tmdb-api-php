<?php

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Models\Change;

class ChangesResponse extends PaginatedResponse
{
    /** @var Change[] */
    protected $results = [];

    /**
     * @return Change[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param Change[] $results
     */
    public function setResults(array $results): ChangesResponse
    {
        foreach ($results as $result) {
            $this->addResult($result);
        }

        return $this;
    }

    public function addResult(Change $result): ChangesResponse
    {
        $this->results[] = $result;

        return $this;
    }
}
