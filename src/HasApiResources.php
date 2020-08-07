<?php

namespace Chiiya\Tmdb;

use Chiiya\Tmdb\Resources\Certifications;
use Chiiya\Tmdb\Resources\Changes;

trait HasApiResources
{
    public function certifications(): Certifications
    {
        return new Certifications($this);
    }

    public function changes(): Changes
    {
        return new Changes($this);
    }
}
