<?php

namespace Chiiya\Tmdb;

use Chiiya\Tmdb\Resources\Certifications;

trait HasApiResources
{
    public function certifications(): Certifications
    {
        return new Certifications($this);
    }
}
