<?php

namespace Chiiya\Tmdb\Models\Tv;

use Chiiya\Tmdb\Models\Media;

class TvShow extends Media
{
    use HasTvAttributes;

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return $this->getMediaAttributes();
    }
}
