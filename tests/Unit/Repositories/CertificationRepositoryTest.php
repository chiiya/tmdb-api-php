<?php

namespace Chiiya\Tmdb\Tests\Unit\Repositories;

use Chiiya\Tmdb\Repositories\CertificationRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class CertificationRepositoryTest extends ApiTestCase
{
    protected CertificationRepository $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new CertificationRepository($this->client);
    }

    public function test_movie_certifications()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('certification/movie/list'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('certifications/movies')));
        $response = $this->repository->getMovieCertifications();
        $this->assertEquals('FR', $response[0]->getCountry());
        $this->assertEquals('16', $response[0]->getCertifications()[0]->getCertification());
    }

    public function test_tv_certifications()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('certification/tv/list'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('certifications/tv')));
        $response = $this->repository->getTvCertifications();
        $this->assertEquals('FR', $response[0]->getCountry());
        $this->assertEquals('10', $response[0]->getCertifications()[0]->getCertification());
    }
}
