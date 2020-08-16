<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Collection;

use Chiiya\Tmdb\Models\Collection\TranslationData;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class TranslationDataTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new TranslationData($attributes);
        $this->assertEquals($attributes['title'], $model->getTitle());
        $this->assertEquals($attributes['overview'], $model->getOverview());
        $this->assertEquals($attributes['homepage'], $model->getHomepage());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new TranslationData($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return Attributes::collectionTranslationData();
    }
}
