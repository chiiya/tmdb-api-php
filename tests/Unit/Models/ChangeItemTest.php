<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\ChangeItem;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class ChangeItemTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new ChangeItem($attributes);
        $this->assertEquals($attributes['id'], $model->getId());
        $this->assertEquals($attributes['action'], $model->getAction());
        $this->assertEquals($attributes['time'], $model->getTime());
        $this->assertEquals($attributes['value'], $model->getValue());
        $this->assertEquals($attributes['original_value'], $model->getOriginalValue());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new ChangeItem($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return Attributes::changeItemAttributes();
    }
}
