<?php

namespace Chiiya\Tmdb\Tests\Unit\Repositories;

use BlastCloud\Guzzler\UsesGuzzler;
use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Repositories\CertificationRepository;
use Chiiya\Tmdb\Tests\MocksApiRequests;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class CertificationRepositoryTest extends TestCase
{
    use UsesGuzzler, MocksApiRequests;

    protected $repository;

    public function setUp(): void
    {
        parent::setUp();
        $client = $this->guzzler->getClient();
        $this->repository = new CertificationRepository(new Client('token', ['client' => $client]));
    }

    public function test_movie_certifications()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('certification/movie/list'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('certifications/movies')));
        $response = $this->repository->getMovieCertifications();
        $this->assertEquals('US', $response->first()->getCountry());
        $this->assertEquals('G', $response->first()->getCertifications()->first()->getCertification());
    }

    public function test_tv_certifications()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('certification/tv/list'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('certifications/tv')));
        $response = $this->repository->getTvCertifications();
        $this->assertEquals('RU', $response->first()->getCountry());
        $this->assertEquals('18+', $response->first()->getCertifications()->first()->getCertification());
    }
}
