<?php

namespace Chiiya\Tmdb\Models;

trait HasMediaAttributes
{
    private int $id;
    private ?string $backdropPath;
    private ?string $posterPath;
    private array $genreIds;
    private string $originalLanguage;
    private string $overview;
    private int $voteCount;
    /** @var float|int */
    private $voteAverage;
    /** @var float|int */
    private $popularity;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getBackdropPath(): ?string
    {
        return $this->backdropPath;
    }

    public function setBackdropPath(?string $backdropPath): void
    {
        $this->backdropPath = $backdropPath;
    }

    public function getPosterPath(): ?string
    {
        return $this->posterPath;
    }

    public function setPosterPath(?string $posterPath): void
    {
        $this->posterPath = $posterPath;
    }

    public function getGenreIds(): array
    {
        return $this->genreIds;
    }

    public function setGenreIds(array $genreIds): void
    {
        $this->genreIds = $genreIds;
    }

    public function getOriginalLanguage(): string
    {
        return $this->originalLanguage;
    }

    public function setOriginalLanguage(string $originalLanguage): void
    {
        $this->originalLanguage = $originalLanguage;
    }

    public function getOverview(): string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): void
    {
        $this->overview = $overview;
    }

    public function getVoteCount(): int
    {
        return $this->voteCount;
    }

    public function setVoteCount(int $voteCount): void
    {
        $this->voteCount = $voteCount;
    }

    /**
     * @return float|int
     */
    public function getVoteAverage()
    {
        return $this->voteAverage;
    }

    /**
     * @param float|int $voteAverage
     */
    public function setVoteAverage($voteAverage): void
    {
        $this->voteAverage = $voteAverage;
    }

    /**
     * @return float|int
     */
    public function getPopularity()
    {
        return $this->popularity;
    }

    /**
     * @param float|int $popularity
     */
    public function setPopularity($popularity): void
    {
        $this->popularity = $popularity;
    }

    protected function getBaseMediaAttributes(): array
    {
        return [
            'id' => $this->getId(),
            'backdrop_path' => $this->getBackdropPath(),
            'poster_path' => $this->getPosterPath(),
            'genre_ids' => $this->getGenreIds(),
            'original_language' => $this->getOriginalLanguage(),
            'overview' => $this->getOverview(),
            'vote_count' => $this->getVoteCount(),
            'vote_average' => $this->getVoteAverage(),
            'popularity' => $this->getPopularity(),
        ];
    }
}
