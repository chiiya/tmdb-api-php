<?php

namespace Chiiya\Tmdb\Common;

use Chiiya\Tmdb\Models\Image;

class ResponseHelper
{
    public static function flatten(array $response): array
    {
        return self::flattenImages(self::flattenTranslations($response));
    }

    public static function flattenTranslations(array $response): array
    {
        if (isset($response['translations'], $response['translations']['translations'])) {
            $response['translations'] = $response['translations']['translations'];
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

        return $response;
    }
}
