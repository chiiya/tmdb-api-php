<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Certification;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use Chiiya\Tmdb\Tests\Unit\LoadsFixtures;
use PHPUnit\Framework\TestCase;

class SerializationTest extends TestCase
{
    use LoadsFixtures;

    public function test_serializes_to_json(): void
    {
        $model = new Certification($this->attributes());
        $attributes = [
            'certification' => 'R',
            'meaning' => 'Under 17 requires accompanying parent or adult guardian 21 or older. The parent/guardian is required to stay with the child under 17 through the entire movie, even if the parent gives the child/teenager permission to see the film alone. These films may contain strong profanity, graphic sexuality, nudity, strong violence, horror, gore, and strong drug use. A movie rated R for profanity often has more severe or frequent language than the PG-13 rating would permit. An R-rated movie may have more blood, gore, drug use, nudity, or graphic sexuality than a PG-13 movie would admit.',
            'order' => 4,
        ];
        $this->assertEquals(json_encode($attributes), $model->__toString());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new Certification($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return $this->getFixture('certifications.movies')['certifications']['US'][0];
    }
}
