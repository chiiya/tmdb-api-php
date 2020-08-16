<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Person;

use Chiiya\Tmdb\Models\Person\ExternalIds;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class ExternalIdsTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new ExternalIds($attributes);
        $this->assertEquals($attributes['twitter_id'], $model->getTwitterId());
        $this->assertEquals($attributes['facebook_id'], $model->getFacebookId());
        $this->assertEquals($attributes['imdb_id'], $model->getImdbId());
        $this->assertEquals($attributes['freebase_id'], $model->getFreebaseId());
        $this->assertEquals($attributes['freebase_mid'], $model->getFreebaseMid());
        $this->assertEquals($attributes['instagram_id'], $model->getInstagramId());
        $this->assertEquals($attributes['tvrage_id'], $model->getTvrageId());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new ExternalIds($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return Attributes::personExternalIdsAttributes();
    }
}
