<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Common\Collection;
use Chiiya\Tmdb\Models\CertificationList;
use PHPUnit\Framework\TestCase;

class CertificationListTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals('US', $model->getCountry());
        $this->assertEquals('G', $model->getCertifications()->first()->getCertification());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'country' => 'US',
            'certifications' => [
                [
                    'certification' => 'G',
                    'meaning' => 'All ages admitted.',
                    'order' => 1,
                ],
            ],
        ], $model->toArray());
    }

    public static function getModel(): CertificationList
    {
        $model = new CertificationList();
        $model
            ->setCountry('US')
            ->setCertifications(new Collection([CertificationTest::getModel()]));

        return $model;
    }
}
