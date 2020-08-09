<?php

namespace Chiiya\Tmdb\Tests\Unit\Query;

use Chiiya\Tmdb\Query\AppendToResponse;
use PHPUnit\Framework\TestCase;

class AppendToResponseTest extends TestCase
{
    public function test_that_it_serializes_correctly(): void
    {
        $query = new AppendToResponse([AppendToResponse::IMAGES, AppendToResponse::TRANSLATIONS]);
        $this->assertEquals('append_to_response', $query->getKey());
        $this->assertEquals('images,translations', $query->getValue());
    }
}
