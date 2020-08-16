<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Certification;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class SerializationTest extends TestCase
{
    public function test_serializes_to_json(): void
    {
        $model = new Certification(Attributes::certificationAttributes());
        $attributes = [
            'certification' => 'G',
            'meaning' => 'All ages admitted.',
            'order' => 1,
        ];
        $this->assertEquals(json_encode($attributes), $model->__toString());
    }
}
