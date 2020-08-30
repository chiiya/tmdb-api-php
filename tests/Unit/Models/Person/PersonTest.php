<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Person;

use Chiiya\Tmdb\Models\Person\Person;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new Person($attributes);
        $this->assertEquals($attributes['id'], $model->getId());
        $this->assertEquals($attributes['name'], $model->getName());
        $this->assertEquals($attributes['birthday'], $model->getBirthday());
        $this->assertEquals('1963', $model->getBirthday()->format('Y'));
        $this->assertEquals($attributes['deathday'], $model->getDeathday());
        $this->assertEquals($attributes['known_for_department'], $model->getKnownForDepartment());
        $this->assertEquals($attributes['also_known_as'], $model->getAlsoKnownAs());
        $this->assertEquals($attributes['gender'], $model->getGender());
        $this->assertEquals($attributes['biography'], $model->getBiography());
        $this->assertEquals($attributes['popularity'], $model->getPopularity());
        $this->assertEquals($attributes['place_of_birth'], $model->getPlaceOfBirth());
        $this->assertEquals($attributes['profile_path'], $model->getProfilePath());
        $this->assertEquals($attributes['adult'], $model->isAdult());
        $this->assertEquals($attributes['imdb_id'], $model->getImdbId());
        $this->assertEquals($attributes['homepage'], $model->getHomepage());
        $this->assertTrue($model->isMale());
        $this->assertFalse($model->isFemale());
        $this->assertFalse($model->isUnknownGender());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new Person($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return Attributes::personAttributes();
    }
}
