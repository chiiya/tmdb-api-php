<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Certification;
use PHPUnit\Framework\TestCase;

class CertificationTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals('G', $model->getCertification());
        $this->assertEquals('All ages admitted.', $model->getMeaning());
        $this->assertEquals(1, $model->getOrder());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'certification' => 'G',
            'meaning' => 'All ages admitted.',
            'order' => 1,
        ], $model->toArray());
    }

    public static function getModel(): Certification
    {
        $model = new Certification();
        $model
            ->setCertification('G')
            ->setMeaning('All ages admitted.')
            ->setOrder(1);
        return $model;
    }
}
