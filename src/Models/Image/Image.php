<?php

namespace Chiiya\Tmdb\Models\Image;

use Chiiya\Tmdb\Models\Entity;
use Chiiya\Tmdb\Models\Media;
use Chiiya\Tmdb\Models\Movie\Movie;
use Chiiya\Tmdb\Models\Tv\TvShow;

class Image extends Entity
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

    protected static string $format = 'image';
    protected float $aspectRatio;
    protected string $filePath;
    protected int $height;
    protected int $width;
    protected int $voteCount;
    /** @var int|float */
    protected $voteAverage;
    protected ?Media $media;

    public function getAspectRatio(): float
    {
        return $this->aspectRatio;
    }

    public function setAspectRatio(float $aspectRatio): void
    {
        $this->aspectRatio = $aspectRatio;
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }

    public function setFilePath(string $filePath): void
    {
        $this->filePath = $filePath;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): void
    {
        $this->width = $width;
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
     * Available for certain endpoints, e.g. tagged images.
     *
     * @return Movie|TvShow|null
     */
    public function getMedia(): ?Media
    {
        return $this->media;
    }

    public function setMedia(Media $media): void
    {
        $this->media = $media;
    }

    public function getType(): string
    {
        return static::$format;
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
}
