<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Person;

use Chiiya\Tmdb\Models\Person\TranslationData;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class TranslationDataTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new TranslationData($attributes);
        $this->assertEquals($attributes['biography'], $model->getBiography());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new TranslationData($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return Attributes::personTranslationDataAttributes();
    }
}
