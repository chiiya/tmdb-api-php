<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\AlternativeName;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class AlternativeNameTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new AlternativeName($attributes);
        $this->assertEquals($attributes['name'], $model->getName());
        $this->assertEquals($attributes['type'], $model->getType());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new AlternativeName($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return Attributes::alternativeNameAttributes();
    }
}
