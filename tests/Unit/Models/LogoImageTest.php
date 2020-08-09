<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Image\LogoImage;
use PHPUnit\Framework\TestCase;

class LogoImageTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals('111', $model->getId());
        $this->assertEquals('.svg', $model->getFileType());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'aspect_ratio' => 1.0,
            'file_path' => 'logo.png',
            'height' => 200,
            'width' => 200,
            'vote_count' => 10,
            'vote_average' => 5.0,
            'id' => '111',
            'file_type' => '.svg',
        ], $model->toArray());
    }

    public static function getModel(): LogoImage
    {
        $model = new LogoImage();
        $model
            ->setAspectRatio(1.0)
            ->setHeight(200)
            ->setWidth(200)
            ->setFilePath('logo.png')
            ->setVoteCount(10)
            ->setVoteAverage(5.0)
            ->setId('111')
            ->setFileType('.svg');

        return $model;
    }
}
