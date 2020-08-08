<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Image;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals(1.0, $model->getAspectRatio());
        $this->assertEquals(200, $model->getHeight());
        $this->assertEquals(200, $model->getWidth());
        $this->assertEquals('poster.jpg', $model->getFilePath());
        $this->assertEquals('en', $model->getIso6391());
        $this->assertEquals(10, $model->getVoteCount());
        $this->assertEquals(5.0, $model->getVoteAverage());

        $this->assertEquals(Image::FORMAT_POSTER, (new Image\PosterImage())->getType());
        $this->assertEquals(Image::FORMAT_BACKDROP, (new Image\BackdropImage())->getType());
        $this->assertEquals(Image::FORMAT_PROFILE, (new Image\ProfileImage())->getType());
        $this->assertEquals(Image::FORMAT_STILL, (new Image\StillImage())->getType());
        $this->assertEquals(Image::FORMAT_LOGO, (new Image\LogoImage())->getType());

        $this->assertEquals('poster.jpg', (string) $model);
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'aspect_ratio' => 1.0,
            'file_path' => 'poster.jpg',
            'height' => 200,
            'width' => 200,
            'iso_639_1' => 'en',
            'vote_count' => 10,
            'vote_average' => 5.0,
        ], $model->toArray());
    }

    public static function getModel()
    {
        $model = new Image\PosterImage();
        $model
            ->setAspectRatio(1.0)
            ->setHeight(200)
            ->setWidth(200)
            ->setFilePath('poster.jpg')
            ->setIso6391('en')
            ->setVoteCount(10)
            ->setVoteAverage(5.0);

        return $model;
    }
}
