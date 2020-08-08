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
    public function setBackdrops(array $backdrops): CollectionImagesResponse
    {
        $this->backdrops = [];
        foreach ($backdrops as $backdrop) {
            $this->addBackdrop($backdrop);
        }

        return $this;
    }

    public function addBackdrop(BackdropImage $image): CollectionImagesResponse
    {
        $this->backdrops[] = $image;

        return $this;
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
    public function setPosters(array $posters): CollectionImagesResponse
    {
        $this->posters = [];
        foreach ($posters as $poster) {
            $this->addPoster($poster);
        }

        return $this;
    }

    public function addPoster(PosterImage $image): CollectionImagesResponse
    {
        $this->posters[] = $image;

        return $this;
    }
}
