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
    private int|float $voteAverage;
    private int|float $popularity;

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

    public function getVoteAverage(): float|int
    {
        return $this->voteAverage;
    }

    public function setVoteAverage(float|int $voteAverage): void
    {
        $this->voteAverage = $voteAverage;
    }

    public function getPopularity(): float|int
    {
        return $this->popularity;
    }

    public function setPopularity(float|int $popularity): void
    {
        $this->popularity = $popularity;
    }
}
