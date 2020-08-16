<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Image;

use Chiiya\Tmdb\Models\Image\BackdropImage;
use Chiiya\Tmdb\Models\Image\Image;
use Chiiya\Tmdb\Models\Image\LogoImage;
use Chiiya\Tmdb\Models\Image\PosterImage;
use Chiiya\Tmdb\Models\Image\ProfileImage;
use Chiiya\Tmdb\Models\Image\StillImage;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new PosterImage($attributes);
        $this->assertEquals($attributes['aspect_ratio'], $model->getAspectRatio());
        $this->assertEquals($attributes['file_path'], $model->getFilePath());
        $this->assertEquals($attributes['height'], $model->getHeight());
        $this->assertEquals($attributes['width'], $model->getWidth());
        $this->assertEquals($attributes['iso_639_1'], $model->getIso6391());
        $this->assertEquals($attributes['vote_count'], $model->getVoteCount());
        $this->assertEquals($attributes['vote_average'], $model->getVoteAverage());

        $this->assertEquals(Image::FORMAT_POSTER, (new PosterImage())->getType());
        $this->assertEquals(Image::FORMAT_BACKDROP, (new BackdropImage())->getType());
        $this->assertEquals(Image::FORMAT_PROFILE, (new ProfileImage())->getType());
        $this->assertEquals(Image::FORMAT_STILL, (new StillImage())->getType());
        $this->assertEquals(Image::FORMAT_LOGO, (new LogoImage())->getType());

        $this->assertEquals('poster.jpg', (string) $model);
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new PosterImage($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return array_merge(Attributes::imageAttributes(), [
            'iso_639_1' => 'en',
        ]);
    }
}
