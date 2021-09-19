<?php

namespace Chiiya\Tmdb\Models\Movie;

trait HasMovieAttributes
{
    private string $title;
    private string $originalTitle;
    private string $releaseDate;
    private bool $adult;
    private bool $video;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getOriginalTitle(): string
    {
        return $this->originalTitle;
    }

    public function setOriginalTitle(string $originalTitle): void
    {
        $this->originalTitle = $originalTitle;
    }

    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(string $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function isAdult(): bool
    {
        return $this->adult;
    }

    public function setAdult(bool $adult): void
    {
        $this->adult = $adult;
    }

    public function isVideo(): bool
    {
        return $this->video;
    }

    public function setVideo(bool $video): void
    {
        $this->video = $video;
    }
}
