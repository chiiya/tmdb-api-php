<?php

namespace Chiiya\Tmdb;

use Chiiya\Tmdb\Resources\Certifications;
use Chiiya\Tmdb\Resources\Changes;
use Chiiya\Tmdb\Resources\Collections;

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

    public function collections(): Collections
    {
        return new Collections($this);
    }
}
