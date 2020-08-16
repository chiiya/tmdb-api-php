<?php

namespace Chiiya\Tmdb\Models\Image;

class StillImage extends Image
{
    use HasIsoInformation;

    protected static string $format = Image::FORMAT_STILL;
}
