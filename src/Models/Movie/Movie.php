<?php

namespace Chiiya\Tmdb\Models\Movie;

use Chiiya\Tmdb\Models\Media;

class Movie extends Media
{
    use HasMovieAttributes;

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return $this->getMediaAttributes();
    }
}
