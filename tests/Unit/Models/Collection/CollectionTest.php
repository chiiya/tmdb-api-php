<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Collection;

use Chiiya\Tmdb\Models\Collection\Collection;
use Chiiya\Tmdb\Models\Collection\Translation;
use Chiiya\Tmdb\Models\Image\PosterImage;
use Chiiya\Tmdb\Models\Movie\Movie;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new Collection($attributes);
        $this->assertEquals($attributes['id'], $model->getId());
        $this->assertEquals($attributes['name'], $model->getName());
        $this->assertEquals($attributes['overview'], $model->getOverview());
        $this->assertEquals($attributes['poster_path'], $model->getPosterPath());
        $this->assertEquals($attributes['backdrop_path'], $model->getBackdropPath());
        $this->assertEquals($attributes['parts'], $model->getParts());
        $this->assertEquals($attributes['posters'], $model->getPosters());
        $this->assertEquals($attributes['backdrops'], $model->getBackdrops());
        $this->assertEquals($attributes['translations'], $model->getTranslations());
        $this->assertEquals('poster.jpg', $model->getImages()[0]->getFilePath());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new Collection($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return [
            'id' => 10,
            'name' => 'Star Wars Collection',
            'overview' => 'Lorem Ipsum',
            'poster_path' => 'poster.jpg',
            'backdrop_path' => 'backdrop.jpg',
            'parts' => [new Movie(Attributes::movieAttributes())],
            'posters' => [new PosterImage(Attributes::imageAttributes())],
            'backdrops' => [],
            'translations' => [new Translation(Attributes::collectionTranslationAttributes())],
        ];
    }
}
