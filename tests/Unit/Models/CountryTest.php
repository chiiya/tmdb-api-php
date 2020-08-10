<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Configuration\Country;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals('CZ', $model->getIso31661());
        $this->assertEquals('Czech Republic', $model->getEnglishName());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'iso_3166_1' => 'CZ',
            'english_name' => 'Czech Republic',
        ], $model->toArray());
    }

    public static function getModel(): Country
    {
        $model = new Country();
        $model
            ->setIso31661('CZ')
            ->setEnglishName('Czech Republic');

        return $model;
    }
}
