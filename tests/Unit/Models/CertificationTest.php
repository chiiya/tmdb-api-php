<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Certification;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class CertificationTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new Certification($attributes);
        $this->assertEquals($attributes['certification'], $model->getCertification());
        $this->assertEquals($attributes['meaning'], $model->getMeaning());
        $this->assertEquals($attributes['order'], $model->getOrder());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new Certification($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return Attributes::certificationAttributes();
    }
}
