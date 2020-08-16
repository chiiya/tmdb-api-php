<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Certification;
use Chiiya\Tmdb\Models\CertificationList;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class CertificationListTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new CertificationList($attributes);
        $this->assertEquals($attributes['country'], $model->getCountry());
        $this->assertEquals($attributes['certifications'], $model->getCertifications());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new CertificationList($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return [
            'country' => 'US',
            'certifications' => [new Certification(Attributes::certificationAttributes())],
        ];
    }
}
