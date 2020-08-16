<?php

namespace Chiiya\Tmdb\Models\Image;

class BackdropImage extends Image
{
    use HasIsoInformation;

    protected static string $format = Image::FORMAT_BACKDROP;
}
