<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Network;
use PHPUnit\Framework\TestCase;

class NetworkTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals(1, $model->getId());
        $this->assertEquals('Fuji TV', $model->getName());
        $this->assertEquals('JP', $model->getOriginCountry());
        $this->assertEquals('Minato, Tokyo Prefecture', $model->getHeadquarters());
        $this->assertEquals('http://www.fujitv.co.jp', $model->getHomepage());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'id' => 1,
            'name' => 'Fuji TV',
            'origin_country' => 'JP',
            'headquarters' => 'Minato, Tokyo Prefecture',
            'homepage' => 'http://www.fujitv.co.jp',
            'alternative_names' => [AlternativeNameTest::getModel()],
            'logos' => [LogoImageTest::getModel()],
        ], $model->toArray());
    }

    public static function getModel(): Network
    {
        $model = new Network();
        $model
            ->setId(1)
            ->setName('Fuji TV')
            ->setOriginCountry('JP')
            ->setHeadquarters('Minato, Tokyo Prefecture')
            ->setHomepage('http://www.fujitv.co.jp')
            ->setAlternativeNames([AlternativeNameTest::getModel()])
            ->setLogos([LogoImageTest::getModel()]);

        return $model;
    }
}
