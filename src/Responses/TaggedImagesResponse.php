<?php

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Models\Image\Image;

class TaggedImagesResponse extends PaginatedResponse
{
    /** @var Image[] */
    private $results = [];

    /**
     * @return Image[]
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param Image[] $results
     */
    public function setResults(array $results): void
    {
        $this->results = [];
        foreach ($results as $result) {
            $this->addResult($result);
        }
    }

    public function addResult(Image $result): void
    {
        $this->results[] = $result;
    }
}
