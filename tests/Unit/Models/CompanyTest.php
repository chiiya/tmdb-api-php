<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Company;
use PHPUnit\Framework\TestCase;

class CompanyTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals(3268, $model->getId());
        $this->assertEquals('HBO', $model->getName());
        $this->assertEquals('Description', $model->getDescription());
        $this->assertEquals('logo.png', $model->getLogoPath());
        $this->assertEquals('NYC', $model->getHeadquarters());
        $this->assertEquals('https://hbogo.com', $model->getHomepage());
        $this->assertEquals('US', $model->getOriginCountry());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'id' => 3268,
            'name' => 'HBO',
            'description' => 'Description',
            'logo_path' => 'logo.png',
            'headquarters' => 'NYC',
            'homepage' => 'https://hbogo.com',
            'origin_country' => 'US',
            'alternative_names' => [AlternativeNameTest::getModel()],
            'logos' => [LogoImageTest::getModel()],
        ], $model->toArray());
    }

    public static function getModel(): Company
    {
        $model = new Company();
        $model
            ->setId(3268)
            ->setName('HBO')
            ->setDescription('Description')
            ->setLogoPath('logo.png')
            ->setHeadquarters('NYC')
            ->setHomepage('https://hbogo.com')
            ->setOriginCountry('US')
            ->setAlternativeNames([AlternativeNameTest::getModel()])
            ->setLogos([LogoImageTest::getModel()]);

        return $model;
    }
}
