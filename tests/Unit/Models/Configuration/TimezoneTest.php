<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Configuration;

use Chiiya\Tmdb\Models\Configuration\Timezone;
use PHPUnit\Framework\TestCase;

class TimezoneTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new Timezone($attributes);
        $this->assertEquals($attributes['iso_3166_1'], $model->getIso31661());
        $this->assertEquals($attributes['zones'], $model->getZones());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new Timezone($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return [
            'iso_3166_1' => 'AD',
            'zones' => ['Europe/Andorra'],
        ];
    }
}
