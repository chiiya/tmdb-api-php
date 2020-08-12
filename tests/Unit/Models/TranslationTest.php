<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Collection\Translation;
use PHPUnit\Framework\TestCase;

class TranslationTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals('DE', $model->getIso31661());
        $this->assertEquals('de', $model->getIso6391());
        $this->assertEquals('Deutsch', $model->getName());
        $this->assertEquals('German', $model->getEnglishName());
        $this->assertEquals('Star Wars Filmreihe', $model->getData()->getTitle());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'iso_3166_1' => 'DE',
            'iso_639_1' => 'de',
            'name' => 'Deutsch',
            'english_name' => 'German',
            'data' => TranslationDataTest::getModel(),
        ], $model->toArray());
    }

    public static function getModel(): Translation
    {
        $model = new Translation();
        $model
            ->setIso31661('DE')
            ->setIso6391('de')
            ->setName('Deutsch')
            ->setEnglishName('German')
            ->setData(TranslationDataTest::getModel());

        return $model;
    }
}
