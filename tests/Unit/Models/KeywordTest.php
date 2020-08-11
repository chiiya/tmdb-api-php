<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Keyword;
use PHPUnit\Framework\TestCase;

class KeywordTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals(378, $model->getId());
        $this->assertEquals('prison', $model->getName());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'id' => 378,
            'name' => 'prison',
        ], $model->toArray());
    }

    public static function getModel(): Keyword
    {
        $model = new Keyword();
        $model
            ->setId(378)
            ->setName('prison');

        return $model;
    }
}
