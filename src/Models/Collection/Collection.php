<?php

namespace Chiiya\Tmdb\Models\Collection;

use Chiiya\Tmdb\Models\Entity;
use Chiiya\Tmdb\Models\Image\BackdropImage;
use Chiiya\Tmdb\Models\Image\Image;
use Chiiya\Tmdb\Models\Image\PosterImage;
use Chiiya\Tmdb\Models\Movie\Movie;

class Collection extends Entity
{
    private int $id;
    private string $name;
    private string $overview;
    private ?string $posterPath;
    private ?string $backdropPath;
    /** @var Movie[] */
    private $parts = [];
    /** @var PosterImage[]|null */
    private $posters;
    /** @var BackdropImage[]|null */
    private $backdrops;
    /** @var Translation[]|null */
    private $translations;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getOverview(): string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): void
    {
        $this->overview = $overview;
    }

    public function getPosterPath(): ?string
    {
        return $this->posterPath;
    }

    public function setPosterPath(?string $posterPath): void
    {
        $this->posterPath = $posterPath;
    }

    public function getBackdropPath(): ?string
    {
        return $this->backdropPath;
    }

    public function setBackdropPath(?string $backdropPath): void
    {
        $this->backdropPath = $backdropPath;
    }

    /**
     * @return Movie[]
     */
    public function getParts(): array
    {
        return $this->parts;
    }

    /**
     * @param Movie[] $parts
     */
    public function setParts(array $parts): void
    {
        $this->parts = [];
        foreach ($parts as $part) {
            $this->addPart($part);
        }
    }

    public function addPart(Movie $partial): void
    {
        $this->parts[] = $partial;
    }

    /**
     * Available when using append_to_response.
     *
     * @return Image[]
     */
    public function getImages(): array
    {
        return array_merge($this->getBackdrops() ?? [], $this->getPosters() ?? []);
    }

    /**
     * Available when using append_to_response.
     *
     * @return PosterImage[]|null
     */
    public function getPosters(): ?array
    {
        return $this->posters;
    }

    /**
     * @param PosterImage[] $posters
     */
    public function setPosters(array $posters): void
    {
        $this->posters = [];
        foreach ($posters as $poster) {
            $this->addPoster($poster);
        }
    }

    public function addPoster(PosterImage $image): void
    {
        $this->posters[] = $image;
    }

    /**
     * Available when using append_to_response.
     *
     * @return BackdropImage[]|null
     */
    public function getBackdrops(): ?array
    {
        return $this->backdrops;
    }

    /**
     * @param BackdropImage[] $backdrops
     */
    public function setBackdrops(array $backdrops): void
    {
        $this->backdrops = [];
        foreach ($backdrops as $backdrop) {
            $this->addBackdrop($backdrop);
        }
    }

    public function addBackdrop(BackdropImage $image): void
    {
        $this->backdrops[] = $image;
    }

    /**
     * Available when using append_to_response.
     *
     * @return Translation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param Translation[] $translations
     */
    public function setTranslations(array $translations): void
    {
        $this->translations = [];
        foreach ($translations as $translation) {
            $this->addTranslation($translation);
        }
    }

    public function addTranslation(Translation $translation): void
    {
        $this->translations[] = $translation;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'overview' => $this->getOverview(),
            'poster_path' => $this->getPosterPath(),
            'backdrop_path' => $this->getBackdropPath(),
            'parts' => $this->getParts(),
            'posters' => $this->getPosters(),
            'backdrops' => $this->getBackdrops(),
            'translations' => $this->getTranslations(),
        ];
    }
}
