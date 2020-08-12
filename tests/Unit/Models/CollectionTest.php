<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Collection\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals(10, $model->getId());
        $this->assertEquals('Star Wars Collection', $model->getName());
        $this->assertEquals('Lorem Ipsum', $model->getOverview());
        $this->assertEquals('poster.jpg', $model->getPosterPath());
        $this->assertEquals('backdrop.jpg', $model->getBackdropPath());
        $this->assertEquals(1891, $model->getParts()[0]->getId());
        $this->assertEquals(200, $model->getPosters()[0]->getHeight());
        $this->assertEquals(200, $model->getImages()[0]->getHeight());
        $this->assertEquals('German', $model->getTranslations()[0]->getEnglishName());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'id' => 10,
            'name' => 'Star Wars Collection',
            'overview' => 'Lorem Ipsum',
            'poster_path' => 'poster.jpg',
            'backdrop_path' => 'backdrop.jpg',
            'parts' => [MoviePartialTest::getModel()],
            'posters' => [ImageTest::getModel()],
            'backdrops' => null,
            'translations' => [TranslationTest::getModel()],
        ], $model->toArray());
    }

    public static function getModel(): Collection
    {
        $model = new Collection();
        $model
            ->setId(10)
            ->setName('Star Wars Collection')
            ->setOverview('Lorem Ipsum')
            ->setPosterPath('poster.jpg')
            ->setBackdropPath('backdrop.jpg')
            ->setParts([MoviePartialTest::getModel()])
            ->setPosters([ImageTest::getModel()])
            ->setTranslations([TranslationTest::getModel()]);

        return $model;
    }
}
