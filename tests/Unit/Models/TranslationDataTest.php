<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Collection\TranslationData;
use PHPUnit\Framework\TestCase;

class TranslationDataTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals('Star Wars Filmreihe', $model->getTitle());
        $this->assertEquals('Lorem Ipsum.', $model->getOverview());
        $this->assertEquals('http://example.org', $model->getHomepage());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'title' => 'Star Wars Filmreihe',
            'overview' => 'Lorem Ipsum.',
            'homepage' => 'http://example.org',
        ], $model->toArray());
    }

    public static function getModel(): TranslationData
    {
        $model = new TranslationData();
        $model
            ->setTitle('Star Wars Filmreihe')
            ->setOverview('Lorem Ipsum.')
            ->setHomepage('http://example.org');

        return $model;
    }
}
