<?php

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Models\ChangedEntity;

class ChangesResponse extends PaginatedResponse
{
    /** @var ChangedEntity[] */
    private array $results = [];

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
    public function setResults(array $results): void
    {
        $this->results = [];
        foreach ($results as $result) {
            $this->addResult($result);
        }
    }

    public function addResult(ChangedEntity $result): void
    {
        $this->results[] = $result;
    }
}
