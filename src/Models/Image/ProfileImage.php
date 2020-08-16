<?php

namespace Chiiya\Tmdb\Models\Image;

class ProfileImage extends Image
{
    use HasIsoInformation;

    protected static string $format = Image::FORMAT_PROFILE;
}
