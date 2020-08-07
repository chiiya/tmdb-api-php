<?php

namespace Chiiya\Tmdb\Tests\Unit\Resources;

use BlastCloud\Guzzler\UsesGuzzler;
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Tests\MocksApiRequests;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class CertificationsTest extends TestCase
{
    use UsesGuzzler, MocksApiRequests;

    protected $client;

    public function setUp(): void
    {
        parent::setUp();
        $client = $this->guzzler->getClient();
        $this->client = new Client('token', ['client' => $client]);
    }

    public function test_movie_certifications(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('certification/movie/list'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('certifications/movies')));
        $response = $this->client->certifications()->getMovieCertifications();
        $this->assertEquals('G', $response['certifications']['US'][0]['certification']);
    }

    public function test_tv_certifications(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('certification/tv/list'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('certifications/tv')));
        $response = $this->client->certifications()->getTvCertifications();
        $this->assertEquals('TV-PG', $response['certifications']['US'][4]['certification']);
    }
}
