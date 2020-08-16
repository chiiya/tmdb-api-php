<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Person;

use Chiiya\Tmdb\Models\Person\TvCrewMember;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class TvCrewMemberTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new TvCrewMember($attributes);
        $this->assertEquals($attributes['credit_id'], $model->getCreditId());
        $this->assertEquals($attributes['department'], $model->getDepartment());
        $this->assertEquals($attributes['job'], $model->getJob());
        $this->assertEquals($attributes['episode_count'], $model->getEpisodeCount());
        $this->assertEquals($attributes['id'], $model->getId());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new TvCrewMember($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return array_merge(Attributes::tvAttributes(), [
            'credit_id' => '52fe492cc3a368484e11dfe1',
            'department' => 'Production',
            'job' => 'Producer',
            'episode_count' => 10,
        ]);
    }
}
