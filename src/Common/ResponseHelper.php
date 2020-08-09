<?php

namespace Chiiya\Tmdb\Common;

use Chiiya\Tmdb\Models\Image\Image;

class ResponseHelper
{
    public static function flatten(array $response): array
    {
        return self::flattenImages(self::flattenTranslations(self::flattenAlternativeNames($response)));
    }

    public static function flattenTranslations(array $response): array
    {
        if (isset($response['translations'], $response['translations']['translations'])) {
            $response['translations'] = $response['translations']['translations'];
        }

        return $response;
    }

    public static function flattenAlternativeNames(array $response): array
    {
        if (isset($response['alternative_names'], $response['alternative_names']['results'])) {
            $response['alternative_names'] = $response['alternative_names']['results'];
        }

        return $response;
    }

    public static function flattenImages(array $response): array
    {
        foreach (Image::FORMATS as $key => $format) {
            if (isset($response['images'], $response['images'][$key])) {
                $response[$key] = $response['images'][$key];
            }
        }

        unset($response['images']);

        return $response;
    }
}
