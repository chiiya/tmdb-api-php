<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Genre;
use PHPUnit\Framework\TestCase;

class GenreTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals(35, $model->getId());
        $this->assertEquals('Comedy', $model->getName());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'id' => 35,
            'name' => 'Comedy',
        ], $model->toArray());
    }

    public static function getModel(): Genre
    {
        $model = new Genre();
        $model
            ->setId(35)
            ->setName('Comedy');

        return $model;
    }
}
