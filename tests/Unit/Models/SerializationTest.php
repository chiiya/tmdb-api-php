<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use PHPUnit\Framework\TestCase;

class SerializationTest extends TestCase
{
    public function test_serializes_to_json(): void
    {
        $model = CertificationTest::getModel();
        $attributes = [
            'certification' => 'G',
            'meaning' => 'All ages admitted.',
            'order' => 1,
        ];
        $this->assertEquals(json_encode($attributes), $model->__toString());
    }
}
