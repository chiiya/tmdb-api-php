<?php

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Models\ChangedEntity;

class ChangesResponse extends PaginatedResponse
{
    /** @var ChangedEntity[] */
    private $results = [];

    /**
     * @return ChangedEntity[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param ChangedEntity[] $results
     */
    public function setResults(array $results): ChangesResponse
    {
        $this->results = [];
        foreach ($results as $result) {
            $this->addResult($result);
        }

        return $this;
    }

    public function addResult(ChangedEntity $result): ChangesResponse
    {
        $this->results[] = $result;

        return $this;
    }
}
