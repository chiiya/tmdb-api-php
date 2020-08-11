<?php

namespace Chiiya\Tmdb;

use Chiiya\Tmdb\Resources\Certifications;
use Chiiya\Tmdb\Resources\Changes;
use Chiiya\Tmdb\Resources\Collections;
use Chiiya\Tmdb\Resources\Companies;
use Chiiya\Tmdb\Resources\Configuration;
use Chiiya\Tmdb\Resources\Genres;
use Chiiya\Tmdb\Resources\Keywords;

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

    public function configuration(): Configuration
    {
        return new Configuration($this);
    }

    public function genres(): Genres
    {
        return new Genres($this);
    }

    public function keywords(): Keywords
    {
        return new Keywords($this);
    }
}
