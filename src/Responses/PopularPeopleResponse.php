<?php

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Models\Person\PopularPersonResult;

class PopularPeopleResponse extends PaginatedResponse
{
    /** @var PopularPersonResult[] */
    private $results = [];

    /**
     * @return PopularPersonResult[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param PopularPersonResult[] $results
     */
    public function setResults(array $results): void
    {
        $this->results = [];
        foreach ($results as $result) {
            $this->addResult($result);
        }
    }

    public function addResult(PopularPersonResult $result): void
    {
        $this->results[] = $result;
    }
}
