<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Person;

use Chiiya\Tmdb\Models\Movie\Movie;
use Chiiya\Tmdb\Models\Person\PopularPersonResult;
use Chiiya\Tmdb\Models\Tv\TvShow;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class PopularPersonResultTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new PopularPersonResult($attributes);
        $this->assertEquals($attributes['id'], $model->getId());
        $this->assertEquals($attributes['known_for'], $model->getKnownFor());
        $this->assertEquals(1891, $model->getKnownFor()[0]->getId());
        $this->assertInstanceOf(TvShow::class, $model->getKnownFor()[1]);
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new PopularPersonResult($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return array_merge(Attributes::personBaseAttributes(), [
            'known_for' => [
                new Movie(Attributes::movieAttributes()),
                new TvShow(Attributes::tvAttributes()),
            ],
        ]);
    }
}
