<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Configuration\Country;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new Country($attributes);
        $this->assertEquals($attributes['iso_3166_1'], $model->getIso31661());
        $this->assertEquals($attributes['english_name'], $model->getEnglishName());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new Country($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return [
            'iso_3166_1' => 'CZ',
            'english_name' => 'Czech Republic',
        ];
    }
}
