<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Person;

use Chiiya\Tmdb\Models\Person\MovieCastMember;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class MovieCastMemberTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new MovieCastMember($attributes);
        $this->assertEquals($attributes['credit_id'], $model->getCreditId());
        $this->assertEquals($attributes['character'], $model->getCharacter());
        $this->assertEquals($attributes['id'], $model->getId());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new MovieCastMember($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return array_merge(Attributes::movieAttributes(), [
            'credit_id' => '52fe4264c3a36847f801b083',
            'character' => 'Achilles',
        ]);
    }
}
