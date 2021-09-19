<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Configuration;

use Chiiya\Tmdb\Models\Configuration\Configuration;
use Chiiya\Tmdb\Models\Configuration\ImageConfiguration;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class ConfigurationTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new Configuration($attributes);
        $this->assertEquals($attributes['images'], $model->getImages());
        $this->assertEquals($attributes['change_keys'], $model->getChangeKeys());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new Configuration($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return [
            'images' => new ImageConfiguration(Attributes::imageConfigurationAttributes()),
            'change_keys' => ['adult', 'budget'],
        ];
    }
}
