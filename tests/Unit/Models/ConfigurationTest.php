<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Configuration\Configuration;
use PHPUnit\Framework\TestCase;

class ConfigurationTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals(['w92', 'w185', 'w300', 'original'], $model->getImages()->getStillSizes());
        $this->assertEquals(['adult', 'budget'], $model->getChangeKeys());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'images' => ImageConfigurationTest::getModel(),
            'change_keys' => ['adult', 'budget'],
        ], $model->toArray());
    }

    public static function getModel(): Configuration
    {
        $model = new Configuration();
        $model
            ->setImages(ImageConfigurationTest::getModel())
            ->setChangeKeys(['adult', 'budget']);

        return $model;
    }
}
