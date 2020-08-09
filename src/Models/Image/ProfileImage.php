<?php

namespace Chiiya\Tmdb\Models\Image;

class ProfileImage extends Image
{
    use HasIsoInformation;

    public function getType(): string
    {
        return Image::FORMAT_PROFILE;
    }
}
