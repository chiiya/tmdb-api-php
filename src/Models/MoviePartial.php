<?php

namespace Chiiya\Tmdb\Models;

class MoviePartial extends Entity
{
    /** @var int */
    private $id;
    /** @var string */
    private $title;
    /** @var string|null */
    private $backdropPath;
    /** @var string|null */
    private $posterPath;
    /** @var int[] */
    private $genreIds;
    /** @var string */
    private $originalLanguage;
    /** @var string */
    private $originalTitle;
    /** @var string */
    private $releaseDate;
    /** @var string */
    private $overview;
    /** @var bool */
    private $adult;
    /** @var bool */
    private $video;
    /** @var int */
    private $voteCount;
    /** @var float */
    private $voteAverage;
    /** @var float */
    private $popularity;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): MoviePartial
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): MoviePartial
    {
        $this->title = $title;

        return $this;
    }

    public function getBackdropPath(): ?string
    {
        return $this->backdropPath;
    }

    public function setBackdropPath(?string $backdropPath): MoviePartial
    {
        $this->backdropPath = $backdropPath;

        return $this;
    }

    public function getPosterPath(): ?string
    {
        return $this->posterPath;
    }

    public function setPosterPath(?string $posterPath): MoviePartial
    {
        $this->posterPath = $posterPath;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getGenreIds(): array
    {
        return $this->genreIds;
    }

    /**
     * @param int[] $genreIds
     */
    public function setGenreIds(array $genreIds): MoviePartial
    {
        $this->genreIds = $genreIds;

        return $this;
    }

    public function getOriginalLanguage(): string
    {
        return $this->originalLanguage;
    }

    public function setOriginalLanguage(string $originalLanguage): MoviePartial
    {
        $this->originalLanguage = $originalLanguage;

        return $this;
    }

    public function getOriginalTitle(): string
    {
        return $this->originalTitle;
    }

    public function setOriginalTitle(string $originalTitle): MoviePartial
    {
        $this->originalTitle = $originalTitle;

        return $this;
    }

    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(string $releaseDate): MoviePartial
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getOverview(): string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): MoviePartial
    {
        $this->overview = $overview;

        return $this;
    }

    public function isAdult(): bool
    {
        return $this->adult;
    }

    public function setAdult(bool $adult): MoviePartial
    {
        $this->adult = $adult;

        return $this;
    }

    public function isVideo(): bool
    {
        return $this->video;
    }

    public function setVideo(bool $video): MoviePartial
    {
        $this->video = $video;

        return $this;
    }

    public function getVoteCount(): int
    {
        return $this->voteCount;
    }

    public function setVoteCount(int $voteCount): MoviePartial
    {
        $this->voteCount = $voteCount;

        return $this;
    }

    public function getVoteAverage(): float
    {
        return $this->voteAverage;
    }

    public function setVoteAverage(float $voteAverage): MoviePartial
    {
        $this->voteAverage = $voteAverage;

        return $this;
    }

    public function getPopularity(): float
    {
        return $this->popularity;
    }

    public function setPopularity(float $popularity): MoviePartial
    {
        $this->popularity = $popularity;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'backdrop_path' => $this->getBackdropPath(),
            'poster_path' => $this->getPosterPath(),
            'genre_ids' => $this->getGenreIds(),
            'original_language' => $this->getOriginalLanguage(),
            'original_title' => $this->getOriginalTitle(),
            'release_date' => $this->getReleaseDate(),
            'overview' => $this->getOverview(),
            'adult' => $this->isAdult(),
            'video' => $this->isVideo(),
            'vote_count' => $this->getVoteCount(),
            'vote_average' => $this->getVoteAverage(),
            'popularity' => $this->getPopularity(),
        ];
    }
}
