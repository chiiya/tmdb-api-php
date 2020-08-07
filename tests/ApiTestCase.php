<?php

namespace Chiiya\Tmdb\Tests;

use BlastCloud\Guzzler\UsesGuzzler;
use Chiiya\Tmdb\Client;
use PHPUnit\Framework\TestCase;

abstract class ApiTestCase extends TestCase
{
    use UsesGuzzler;
    use MocksApiRequests;

    /** @var Client */
    protected $client;

    public function setUp(): void
    {
        parent::setUp();
        $client = $this->guzzler->getClient();
        $this->client = new Client('token', ['client' => $client]);
    }
}
