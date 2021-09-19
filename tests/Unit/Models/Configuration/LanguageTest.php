<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Configuration;

use Chiiya\Tmdb\Models\Configuration\Language;
use Chiiya\Tmdb\Tests\ApiTestCase;

class LanguageTest extends ApiTestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new Language($attributes);
        $this->assertEquals($attributes['iso_639_1'], $model->getIso6391());
        $this->assertEquals($attributes['english_name'], $model->getEnglishName());
        $this->assertEquals($attributes['name'], $model->getName());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new Language($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return [
            'iso_639_1' => 'cy',
            'english_name' => 'Welsh',
            'name' => 'Cymraeg',
        ];
    }
}
