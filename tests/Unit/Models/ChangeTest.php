<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Change;
use Chiiya\Tmdb\Models\ChangeItem;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class ChangeTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new Change($attributes);
        $this->assertEquals($attributes['key'], $model->getKey());
        $this->assertEquals($attributes['items'], $model->getItems());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new Change($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return [
            'key' => 'images',
            'items' => [new ChangeItem(Attributes::changeItemAttributes())],
        ];
    }
}
