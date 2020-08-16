<?php

namespace Chiiya\Tmdb\Models\Image;

class PosterImage extends Image
{
    use HasIsoInformation;

    protected static string $format = Image::FORMAT_POSTER;
}
