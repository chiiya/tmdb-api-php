<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Image;

use Chiiya\Tmdb\Models\Image\LogoImage;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class LogoImageTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new LogoImage($attributes);
        $this->assertEquals($attributes['aspect_ratio'], $model->getAspectRatio());
        $this->assertEquals($attributes['id'], $model->getId());
        $this->assertEquals($attributes['file_type'], $model->getFileType());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new LogoImage($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return Attributes::logoAttributes();
    }
}
