<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Configuration\Timezone;
use PHPUnit\Framework\TestCase;

class TimezoneTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals('AD', $model->getIso31661());
        $this->assertEquals(['Europe/Andorra'], $model->getZones());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'iso_3166_1' => 'AD',
            'zones' => ['Europe/Andorra'],
        ], $model->toArray());
    }

    public static function getModel(): Timezone
    {
        $model = new Timezone();
        $model
            ->setIso31661('AD')
            ->setZones(['Europe/Andorra']);

        return $model;
    }
}
