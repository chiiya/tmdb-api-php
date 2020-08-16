<?php

namespace Chiiya\Tmdb\Models;

use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

/**
 * @DiscriminatorMap(typeProperty="media_type", mapping={
 *    "movie"="Chiiya\Tmdb\Models\Movie\Movie",
 *    "tv"="Chiiya\Tmdb\Models\Tv\TvShow"
 * })
 */
abstract class Media extends Entity
{
    use HasMediaAttributes;
}
