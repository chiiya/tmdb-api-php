<?php

namespace Chiiya\Tmdb;

use Chiiya\Tmdb\Resources\Certifications;
use Chiiya\Tmdb\Resources\Changes;
use Chiiya\Tmdb\Resources\Collections;
use Chiiya\Tmdb\Resources\Companies;

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

    public function companies(): Companies
    {
        return new Companies($this);
    }
}
