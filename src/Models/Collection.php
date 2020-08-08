<?php

namespace Chiiya\Tmdb\Models;

use Chiiya\Tmdb\Models\Image\BackdropImage;
use Chiiya\Tmdb\Models\Image\PosterImage;

class Collection extends Entity
{
    /** @var int */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $overview;
    /** @var string|null */
    private $posterPath;
    /** @var string|null */
    private $backdropPath;
    /** @var MoviePartial[] */
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

    public function setId(int $id): Collection
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Collection
    {
        $this->name = $name;

        return $this;
    }

    public function getOverview(): string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): Collection
    {
        $this->overview = $overview;

        return $this;
    }

    public function getPosterPath(): ?string
    {
        return $this->posterPath;
    }

    public function setPosterPath(?string $posterPath): Collection
    {
        $this->posterPath = $posterPath;

        return $this;
    }

    public function getBackdropPath(): ?string
    {
        return $this->backdropPath;
    }

    public function setBackdropPath(?string $backdropPath): Collection
    {
        $this->backdropPath = $backdropPath;

        return $this;
    }

    /**
     * @return MoviePartial[]
     */
    public function getParts(): array
    {
        return $this->parts;
    }

    /**
     * @param MoviePartial[] $parts
     */
    public function setParts(array $parts): Collection
    {
        $this->parts = [];
        foreach ($parts as $part) {
            $this->addPart($part);
        }

        return $this;
    }

    public function addPart(MoviePartial $partial): Collection
    {
        $this->parts[] = $partial;

        return $this;
    }

    /**
     * @return Image[]
     */
    public function getImages(): array
    {
        return ($this->getBackdrops() ?? []) + ($this->getPosters() ?? []);
    }

    /**
     * @return PosterImage[]|null
     */
    public function getPosters(): ?array
    {
        return $this->posters;
    }

    /**
     * @param PosterImage[] $posters
     */
    public function setPosters(array $posters): Collection
    {
        $this->posters = [];
        foreach ($posters as $poster) {
            $this->addPoster($poster);
        }

        return $this;
    }

    public function addPoster(PosterImage $image): Collection
    {
        $this->posters[] = $image;

        return $this;
    }

    /**
     * @return BackdropImage[]|null
     */
    public function getBackdrops(): ?array
    {
        return $this->backdrops;
    }

    /**
     * @param BackdropImage[] $backdrops
     */
    public function setBackdrops(array $backdrops): Collection
    {
        $this->backdrops = [];
        foreach ($backdrops as $backdrop) {
            $this->addBackdrop($backdrop);
        }

        return $this;
    }

    public function addBackdrop(BackdropImage $image): Collection
    {
        $this->backdrops[] = $image;

        return $this;
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
    public function setTranslations(array $translations): Collection
    {
        $this->translations = [];
        foreach ($translations as $translation) {
            $this->addTranslation($translation);
        }

        return $this;
    }

    public function addTranslation(Translation $translation): Collection
    {
        $this->translations[] = $translation;

        return $this;
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
