<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\AlternativeName;
use PHPUnit\Framework\TestCase;

class AlternativeNameTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals('Home Box Office', $model->getName());
        $this->assertEquals('Long', $model->getType());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'name' => 'Home Box Office',
            'type' => 'Long',
        ], $model->toArray());
    }

    public static function getModel(): AlternativeName
    {
        $model = new AlternativeName();
        $model
            ->setName('Home Box Office')
            ->setType('Long');

        return $model;
    }
}
