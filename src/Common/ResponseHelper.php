<?php

namespace Chiiya\Tmdb\Common;

use Chiiya\Tmdb\Models\Image\Image;

class ResponseHelper
{
    public static function flatten(array $response): array
    {
        if (isset($response['changes'], $response['changes']['changes'])) {
            $response['changes'] = $response['changes']['changes'];
        }

        if (isset($response['translations'], $response['translations']['translations'])) {
            $response['translations'] = $response['translations']['translations'];
        }

        if (isset($response['alternative_names'], $response['alternative_names']['results'])) {
            $response['alternative_names'] = $response['alternative_names']['results'];
        }

        return self::flattenImages($response);
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

    public static function normalizeDiscriminators(array $response): array
    {
        if (
            array_key_exists('results', $response)
            && count($response['results']) > 0
            && array_key_exists('media', $response['results'][0])
            && array_key_exists('media_type', $response['results'][0])
        ) {
            $response['results'] = array_map(function (array $result) {
                $result['media']['media_type'] = $result['media_type'];

                return $result;
            }, $response['results']);
        }

        return $response;
    }
}
