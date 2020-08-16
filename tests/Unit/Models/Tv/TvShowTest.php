<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Tv;

use Chiiya\Tmdb\Models\Tv\TvShow;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class TvShowTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new TvShow($attributes);
        $this->assertEquals($attributes['id'], $model->getId());
        $this->assertEquals($attributes['overview'], $model->getOverview());
        $this->assertEquals($attributes['vote_average'], $model->getVoteAverage());
        $this->assertEquals($attributes['vote_count'], $model->getVoteCount());
        $this->assertEquals($attributes['backdrop_path'], $model->getBackdropPath());
        $this->assertEquals($attributes['genre_ids'], $model->getGenreIds());
        $this->assertEquals($attributes['original_language'], $model->getOriginalLanguage());
        $this->assertEquals($attributes['popularity'], $model->getPopularity());
        $this->assertEquals($attributes['poster_path'], $model->getPosterPath());
        $this->assertEquals($attributes['name'], $model->getName());
        $this->assertEquals($attributes['original_name'], $model->getOriginalName());
        $this->assertEquals($attributes['origin_country'], $model->getOriginCountry());
        $this->assertEquals($attributes['first_air_date'], $model->getFirstAirDate());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new TvShow($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return Attributes::tvAttributes();
    }
}
