<?php

namespace Chiiya\Tmdb\Tests;

use Chiiya\Tmdb\Client;

trait MocksApiRequests
{
    protected function url(string $path)
    {
        return Client::TMDB_URI.'/'.ltrim($path, '/');
    }

    protected function getMockResponse(string $path)
    {
        return file_get_contents(__DIR__.'/responses/'.$path.'.json');
    }
}
