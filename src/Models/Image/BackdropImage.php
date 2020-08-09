<?php

namespace Chiiya\Tmdb\Models\Image;

class BackdropImage extends Image
{
    use HasIsoInformation;

    public function getType(): string
    {
        return Image::FORMAT_BACKDROP;
    }
}
