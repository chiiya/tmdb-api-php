<?php

namespace Chiiya\Tmdb\Tests\Unit\Query;

use Chiiya\Tmdb\Query\Page;
use PHPUnit\Framework\TestCase;

class PageTest extends TestCase
{
    public function test_that_it_serializes_correctly(): void
    {
        $query = new Page(2);
        $this->assertEquals('page', $query->getKey());
        $this->assertEquals('2', $query->getValue());
    }
}
