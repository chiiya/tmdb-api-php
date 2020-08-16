<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\AlternativeName;
use Chiiya\Tmdb\Models\Image\LogoImage;
use Chiiya\Tmdb\Models\Network;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class NetworkTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new Network($attributes);
        $this->assertEquals($attributes['id'], $model->getId());
        $this->assertEquals($attributes['name'], $model->getName());
        $this->assertEquals($attributes['origin_country'], $model->getOriginCountry());
        $this->assertEquals($attributes['headquarters'], $model->getHeadquarters());
        $this->assertEquals($attributes['homepage'], $model->getHomepage());
        $this->assertEquals($attributes['alternative_names'], $model->getAlternativeNames());
        $this->assertEquals($attributes['logos'], $model->getLogos());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new Network($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return [
            'id' => 1,
            'name' => 'Fuji TV',
            'origin_country' => 'JP',
            'headquarters' => 'Minato, Tokyo Prefecture',
            'homepage' => 'http://www.fujitv.co.jp',
            'alternative_names' => [new AlternativeName(Attributes::alternativeNameAttributes())],
            'logos' => [new LogoImage(Attributes::logoAttributes())],
        ];
    }
}
