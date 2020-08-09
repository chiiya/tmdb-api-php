<?php

namespace Chiiya\Tmdb\Models\Image;

use Chiiya\Tmdb\Models\Entity;

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
    protected $aspectRatio;
    /** @var string */
    protected $filePath;
    /** @var int */
    protected $height;
    /** @var int */
    protected $width;
    /** @var int */
    protected $voteCount;
    /** @var float */
    protected $voteAverage;

    public function getAspectRatio(): float
    {
        return $this->aspectRatio;
    }

    /**
     * @return static
     */
    public function setAspectRatio(float $aspectRatio)
    {
        $this->aspectRatio = $aspectRatio;

        return $this;
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * @return static
     */
    public function setFilePath(string $filePath)
    {
        $this->filePath = $filePath;

        return $this;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @return static
     */
    public function setHeight(int $height)
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return static
     */
    public function setWidth(int $width)
    {
        $this->width = $width;

        return $this;
    }

    public function getVoteCount(): int
    {
        return $this->voteCount;
    }

    /**
     * @return static
     */
    public function setVoteCount(int $voteCount)
    {
        $this->voteCount = $voteCount;

        return $this;
    }

    public function getVoteAverage(): float
    {
        return $this->voteAverage;
    }

    /**
     * @return static
     */
    public function setVoteAverage(float $voteAverage)
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
