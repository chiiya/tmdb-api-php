<?php

namespace Chiiya\Tmdb\Models\Image;

class StillImage extends Image
{
    use HasIsoInformation;

    public function getType(): string
    {
        return Image::FORMAT_STILL;
    }
}
