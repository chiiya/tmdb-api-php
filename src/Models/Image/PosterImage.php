<?php

namespace Chiiya\Tmdb\Models\Image;

class PosterImage extends Image
{
    use HasIsoInformation;

    public function getType(): string
    {
        return Image::FORMAT_POSTER;
    }
}
