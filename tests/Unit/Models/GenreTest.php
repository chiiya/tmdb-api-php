<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Genre;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class GenreTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new Genre($attributes);
        $this->assertEquals($attributes['id'], $model->getId());
        $this->assertEquals($attributes['name'], $model->getName());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new Genre($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return Attributes::genreAttributes();
    }
}
