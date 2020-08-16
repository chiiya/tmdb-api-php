<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Person;

use Chiiya\Tmdb\Models\Person\TvCastMember;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class TvCastMemberTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new TvCastMember($attributes);
        $this->assertEquals($attributes['credit_id'], $model->getCreditId());
        $this->assertEquals($attributes['character'], $model->getCharacter());
        $this->assertEquals($attributes['episode_count'], $model->getEpisodeCount());
        $this->assertEquals($attributes['id'], $model->getId());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new TvCastMember($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return array_merge(Attributes::tvAttributes(), [
            'credit_id' => '52fe4264c3a36847f801b083',
            'character' => 'Achilles',
            'episode_count' => 10,
        ]);
    }
}
