<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Collection;

use Chiiya\Tmdb\Models\Collection\Translation;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class TranslationTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new Translation($attributes);
        $this->assertEquals($attributes['iso_3166_1'], $model->getIso31661());
        $this->assertEquals($attributes['iso_639_1'], $model->getIso6391());
        $this->assertEquals($attributes['name'], $model->getName());
        $this->assertEquals($attributes['english_name'], $model->getEnglishName());
        $this->assertEquals($attributes['data'], $model->getData());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new Translation($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return Attributes::collectionTranslationAttributes();
    }
}
