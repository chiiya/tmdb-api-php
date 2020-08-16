<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Configuration;

use Chiiya\Tmdb\Models\Configuration\ImageConfiguration;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class ImageConfigurationTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new ImageConfiguration($attributes);
        $this->assertEquals($attributes['base_url'], $model->getBaseUrl());
        $this->assertEquals($attributes['secure_base_url'], $model->getSecureBaseUrl());
        $this->assertEquals($attributes['backdrop_sizes'], $model->getBackdropSizes());
        $this->assertEquals($attributes['logo_sizes'], $model->getLogoSizes());
        $this->assertEquals($attributes['poster_sizes'], $model->getPosterSizes());
        $this->assertEquals($attributes['profile_sizes'], $model->getProfileSizes());
        $this->assertEquals($attributes['still_sizes'], $model->getStillSizes());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new ImageConfiguration($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return Attributes::imageConfigurationAttributes();
    }
}
