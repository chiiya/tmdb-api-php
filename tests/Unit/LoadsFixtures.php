<?php

namespace Chiiya\Tmdb\Tests\Unit;

trait LoadsFixtures
{
    protected function getFixture(string $path): array
    {
        $path = __DIR__.'/../../fixtures/responses/'.str_replace('.', '/', $path).'.json';

        return json_decode(file_get_contents($path), true);
    }
}
