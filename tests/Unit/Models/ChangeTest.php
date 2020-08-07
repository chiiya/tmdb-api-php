<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Change;
use PHPUnit\Framework\TestCase;

class ChangeTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals(10, $model->getId());
        $this->assertEquals(false, $model->getAdult());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'id' => 10,
            'adult' => false,
        ], $model->toArray());
    }

    public static function getModel(): Change
    {
        $model = new Change();
        $model
            ->setId(10)
            ->setAdult(false);

        return $model;
    }
}
