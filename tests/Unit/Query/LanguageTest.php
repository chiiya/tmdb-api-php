<?php

namespace Chiiya\Tmdb\Tests\Unit\Query;

use Chiiya\Tmdb\Query\Language;
use PHPUnit\Framework\TestCase;

class LanguageTest extends TestCase
{
    public function test_that_it_serializes_correctly(): void
    {
        $query = new Language();
        $this->assertEquals('language', $query->getKey());
        $this->assertEquals('en-US', $query->getValue());
        $query = new Language('es-ES');
        $this->assertEquals('language', $query->getKey());
        $this->assertEquals('es-ES', $query->getValue());
    }
}
