<?php

namespace Chiiya\Tmdb\Models;

abstract class Image extends Entity
{
    public const FORMAT_POSTER = 'poster';
    public const FORMAT_BACKDROP = 'backdrop';
    public const FORMAT_PROFILE = 'profile';
    public const FORMAT_LOGO = 'logo';
    public const FORMAT_STILL = 'still';

    public const FORMATS = [
        'posters' => self::FORMAT_POSTER,
        'backdrops' => self::FORMAT_BACKDROP,
        'profiles' => self::FORMAT_PROFILE,
        'logos' => self::FORMAT_LOGO,
        'stills' => self::FORMAT_STILL,
    ];

    /** @var float */
    private $aspectRatio;
    /** @var string */
    private $filePath;
    /** @var int */
    private $height;
    /** @var int */
    private $width;
    /** @var string|null */
    private $iso6391;
    /** @var int */
    private $voteCount;
    /** @var float */
    private $voteAverage;

    public function getAspectRatio(): float
    {
        return $this->aspectRatio;
    }

    public function setAspectRatio(float $aspectRatio): Image
    {
        $this->aspectRatio = $aspectRatio;

        return $this;
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }

    public function setFilePath(string $filePath): Image
    {
        $this->filePath = $filePath;

        return $this;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): Image
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): Image
    {
        $this->width = $width;

        return $this;
    }

    public function getIso6391(): ?string
    {
        return $this->iso6391;
    }

    public function setIso6391(?string $iso6391): Image
    {
        $this->iso6391 = $iso6391;

        return $this;
    }

    public function getVoteCount(): int
    {
        return $this->voteCount;
    }

    public function setVoteCount(int $voteCount): Image
    {
        $this->voteCount = $voteCount;

        return $this;
    }

    public function getVoteAverage(): float
    {
        return $this->voteAverage;
    }

    public function setVoteAverage(float $voteAverage): Image
    {
        $this->voteAverage = $voteAverage;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'aspect_ratio' => $this->getAspectRatio(),
            'file_path' => $this->getFilePath(),
            'height' => $this->getHeight(),
            'width' => $this->getWidth(),
            'iso_639_1' => $this->getIso6391(),
            'vote_count' => $this->getVoteCount(),
            'vote_average' => $this->getVoteAverage(),
        ];
    }

    public function __toString(): string
    {
        return $this->getFilePath();
    }

    abstract public function getType(): string;
}
