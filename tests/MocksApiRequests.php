<?php

namespace Chiiya\Tmdb\Tests;

use Chiiya\Tmdb\Client;

trait MocksApiRequests
{
    protected function url(string $path): string
    {
        return Client::TMDB_URI.'/'.ltrim($path, '/');
    }

    protected function getMockResponse(string $path): string
    {
        return file_get_contents(__DIR__.'/../fixtures/responses/'.$path.'.json');
    }
}
