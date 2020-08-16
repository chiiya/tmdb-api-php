<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Movie;

use Chiiya\Tmdb\Models\Movie\Movie;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class MovieTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new Movie($attributes);
        $this->assertEquals($attributes['id'], $model->getId());
        $this->assertEquals($attributes['title'], $model->getTitle());
        $this->assertEquals($attributes['overview'], $model->getOverview());
        $this->assertEquals($attributes['vote_average'], $model->getVoteAverage());
        $this->assertEquals($attributes['vote_count'], $model->getVoteCount());
        $this->assertEquals($attributes['adult'], $model->isAdult());
        $this->assertEquals($attributes['backdrop_path'], $model->getBackdropPath());
        $this->assertEquals($attributes['genre_ids'], $model->getGenreIds());
        $this->assertEquals($attributes['original_language'], $model->getOriginalLanguage());
        $this->assertEquals($attributes['original_title'], $model->getOriginalTitle());
        $this->assertEquals($attributes['popularity'], $model->getPopularity());
        $this->assertEquals($attributes['poster_path'], $model->getPosterPath());
        $this->assertEquals($attributes['release_date'], $model->getReleaseDate());
        $this->assertEquals($attributes['video'], $model->isVideo());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new Movie($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return Attributes::movieAttributes();
    }
}
