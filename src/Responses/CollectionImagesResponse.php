<?php

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Models\Image\BackdropImage;
use Chiiya\Tmdb\Models\Image\PosterImage;

class CollectionImagesResponse
{
    /** @var BackdropImage[] */
    private $backdrops = [];
    /** @var PosterImage[] */
    private $posters = [];

    /**
     * @return BackdropImage[]
     */
    public function getBackdrops(): array
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
     * @return PosterImage[]
     */
    public function getPosters(): array
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
}
