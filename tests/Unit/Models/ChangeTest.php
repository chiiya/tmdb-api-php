<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Change;
use PHPUnit\Framework\TestCase;

class ChangeTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new Change($attributes);
        $this->assertEquals($attributes['id'], $model->getId());
        $this->assertEquals($attributes['adult'], $model->getAdult());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new Change($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return [
            'id' => 10,
            'adult' => false,
        ];
    }
}
