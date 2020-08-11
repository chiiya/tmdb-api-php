<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Review;
use PHPUnit\Framework\TestCase;

class ReviewTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals('5d63da037f6c8d03acedc04b', $model->getId());
        $this->assertEquals('Author', $model->getAuthor());
        $this->assertEquals('Lorem Ipsum', $model->getContent());
        $this->assertEquals('en', $model->getIso6391());
        $this->assertEquals(335984, $model->getMediaId());
        $this->assertEquals('Blade Runner 2049', $model->getMediaTitle());
        $this->assertEquals('Movie', $model->getMediaType());
        $this->assertEquals('https://www.themoviedb.org/review/5d63da037f6c8d03acedc04b', $model->getUrl());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'id' => '5d63da037f6c8d03acedc04b',
            'author' => 'Author',
            'content' => 'Lorem Ipsum',
            'iso_639_1' => 'en',
            'media_id' => 335984,
            'media_title' => 'Blade Runner 2049',
            'media_type' => 'Movie',
            'url' => 'https://www.themoviedb.org/review/5d63da037f6c8d03acedc04b',
        ], $model->toArray());
    }

    public static function getModel(): Review
    {
        $model = new Review();
        $model
            ->setId('5d63da037f6c8d03acedc04b')
            ->setAuthor('Author')
            ->setContent('Lorem Ipsum')
            ->setIso6391('en')
            ->setMediaId(335984)
            ->setMediaTitle('Blade Runner 2049')
            ->setMediaType('Movie')
            ->setUrl('https://www.themoviedb.org/review/5d63da037f6c8d03acedc04b');

        return $model;
    }
}
