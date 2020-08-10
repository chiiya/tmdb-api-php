<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Configuration\ImageConfiguration;
use PHPUnit\Framework\TestCase;

class ImageConfigurationTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals('http://image.tmdb.org/t/p/', $model->getBaseUrl());
        $this->assertEquals('https://image.tmdb.org/t/p/', $model->getSecureBaseUrl());
        $this->assertEquals(['w300', 'w780', 'w1280', 'original'], $model->getBackdropSizes());
        $this->assertEquals(['w45', 'w92', 'w154', 'w185', 'w300', 'w500', 'original'], $model->getLogoSizes());
        $this->assertEquals(['w92', 'w154', 'w185', 'w342', 'w500', 'w780', 'original'], $model->getPosterSizes());
        $this->assertEquals(['w45', 'w185', 'h632', 'original'], $model->getProfileSizes());
        $this->assertEquals(['w92', 'w185', 'w300', 'original'], $model->getStillSizes());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'base_url' => 'http://image.tmdb.org/t/p/',
            'secure_base_url' => 'https://image.tmdb.org/t/p/',
            'backdrop_sizes' => ['w300', 'w780', 'w1280', 'original'],
            'logo_sizes' => ['w45', 'w92', 'w154', 'w185', 'w300', 'w500', 'original'],
            'poster_sizes' => ['w92', 'w154', 'w185', 'w342', 'w500', 'w780', 'original'],
            'profile_sizes' => ['w45', 'w185', 'h632', 'original'],
            'still_sizes' => ['w92', 'w185', 'w300', 'original'],
        ], $model->toArray());
    }

    public static function getModel()
    {
        $model = new ImageConfiguration();
        $model
            ->setBaseUrl('http://image.tmdb.org/t/p/')
            ->setSecureBaseUrl('https://image.tmdb.org/t/p/')
            ->setBackdropSizes(['w300', 'w780', 'w1280', 'original'])
            ->setLogoSizes(['w45', 'w92', 'w154', 'w185', 'w300', 'w500', 'original'])
            ->setPosterSizes(['w92', 'w154', 'w185', 'w342', 'w500', 'w780', 'original'])
            ->setProfileSizes(['w45', 'w185', 'h632', 'original'])
            ->setStillSizes(['w92', 'w185', 'w300', 'original']);

        return $model;
    }
}
