<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Review;
use PHPUnit\Framework\TestCase;

class ReviewTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new Review($attributes);
        $this->assertEquals($attributes['id'], $model->getId());
        $this->assertEquals($attributes['author'], $model->getAuthor());
        $this->assertEquals($attributes['content'], $model->getContent());
        $this->assertEquals($attributes['iso_639_1'], $model->getIso6391());
        $this->assertEquals($attributes['media_id'], $model->getMediaId());
        $this->assertEquals($attributes['media_title'], $model->getMediaTitle());
        $this->assertEquals($attributes['media_type'], $model->getMediaType());
        $this->assertEquals($attributes['url'], $model->getUrl());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new Review($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return [
            'id' => '5d63da037f6c8d03acedc04b',
            'author' => 'Author',
            'content' => 'Lorem Ipsum',
            'iso_639_1' => 'en',
            'media_id' => 335984,
            'media_title' => 'Blade Runner 2049',
            'media_type' => 'Movie',
            'url' => 'https://www.themoviedb.org/review/5d63da037f6c8d03acedc04b',
        ];
    }
}
