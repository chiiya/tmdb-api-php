<?php

namespace Chiiya\Tmdb\Models\Image;

use Chiiya\Tmdb\Models\Image;

class PosterImage extends Image
{
    public function getType(): string
    {
        return Image::FORMAT_POSTER;
    }
}
