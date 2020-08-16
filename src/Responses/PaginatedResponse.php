<?php

namespace Chiiya\Tmdb\Responses;

abstract class PaginatedResponse
{
    protected int $page;
    protected int $totalPages;
    protected int $totalResults;

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): PaginatedResponse
    {
        $this->page = $page;

        return $this;
    }

    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    public function setTotalPages(int $totalPages): PaginatedResponse
    {
        $this->totalPages = $totalPages;

        return $this;
    }

    public function getTotalResults(): int
    {
        return $this->totalResults;
    }

    public function setTotalResults(int $totalResults): PaginatedResponse
    {
        $this->totalResults = $totalResults;

        return $this;
    }
}
