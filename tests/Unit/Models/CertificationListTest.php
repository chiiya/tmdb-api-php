<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\CertificationList;
use PHPUnit\Framework\TestCase;

class CertificationListTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals('US', $model->getCountry());
        $this->assertEquals('G', $model->getCertifications()[0]->getCertification());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'country' => 'US',
            'certifications' => [CertificationTest::getModel()],
        ], $model->toArray());
    }

    public static function getModel(): CertificationList
    {
        $model = new CertificationList();
        $model
            ->setCountry('US')
            ->setCertifications([CertificationTest::getModel()]);

        return $model;
    }
}
