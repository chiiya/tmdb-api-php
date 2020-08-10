<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Configuration\Language;
use Chiiya\Tmdb\Tests\ApiTestCase;

class LanguageTest extends ApiTestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals('cy', $model->getIso6391());
        $this->assertEquals('Welsh', $model->getEnglishName());
        $this->assertEquals('Cymraeg', $model->getName());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'iso_639_1' => 'cy',
            'english_name' => 'Welsh',
            'name' => 'Cymraeg',
        ], $model->toArray());
    }

    public static function getModel(): Language
    {
        $model = new Language();
        $model
            ->setIso6391('cy')
            ->setEnglishName('Welsh')
            ->setName('Cymraeg');

        return $model;
    }
}
