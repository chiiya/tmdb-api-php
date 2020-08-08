<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\MoviePartial;
use PHPUnit\Framework\TestCase;

class MoviePartialTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals(1891, $model->getId());
        $this->assertEquals('The Empire Strikes Back', $model->getTitle());
        $this->assertEquals('Lorem Ipsum', $model->getOverview());
        $this->assertEquals(8.4, $model->getVoteAverage());
        $this->assertEquals(11858, $model->getVoteCount());
        $this->assertEquals(false, $model->isAdult());
        $this->assertEquals('backdrop.jpg', $model->getBackdropPath());
        $this->assertEquals([12, 28], $model->getGenreIds());
        $this->assertEquals('en', $model->getOriginalLanguage());
        $this->assertEquals('The Empire Strikes Back', $model->getOriginalTitle());
        $this->assertEquals(25.279, $model->getPopularity());
        $this->assertEquals('poster.jpg', $model->getPosterPath());
        $this->assertEquals('1980-05-20', $model->getReleaseDate());
        $this->assertEquals(false, $model->isVideo());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'id' => 1891,
            'title' => 'The Empire Strikes Back',
            'backdrop_path' => 'backdrop.jpg',
            'poster_path' => 'poster.jpg',
            'genre_ids' => [12, 28],
            'original_language' => 'en',
            'original_title' => 'The Empire Strikes Back',
            'release_date' => '1980-05-20',
            'overview' => 'Lorem Ipsum',
            'adult' => false,
            'video' => false,
            'vote_count' => 11858,
            'vote_average' => 8.4,
            'popularity' => 25.279,
        ], $model->toArray());
    }

    public static function getModel(): MoviePartial
    {
        $model = new MoviePartial();
        $model
            ->setId(1891)
            ->setTitle('The Empire Strikes Back')
            ->setOverview('Lorem Ipsum')
            ->setVoteAverage(8.4)
            ->setVoteCount(11858)
            ->setAdult(false)
            ->setBackdropPath('backdrop.jpg')
            ->setGenreIds([12, 28])
            ->setOriginalLanguage('en')
            ->setOriginalTitle('The Empire Strikes Back')
            ->setPopularity(25.279)
            ->setPosterPath('poster.jpg')
            ->setReleaseDate('1980-05-20')
            ->setVideo(false);

        return $model;
    }
}
