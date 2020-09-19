<?php

namespace Chiiya\Tmdb\Tests\Unit\Repositories;

use Chiiya\Tmdb\Repositories\KeywordRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class KeywordRepositoryTest extends ApiTestCase
{
    /** @var KeywordRepository */
    protected $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new KeywordRepository($this->client);
    }

    public function test_details()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('keyword/378'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('keywords/details')));
        $response = $this->repository->getKeyword(378);
        $this->assertEquals(378, $response->getId());
        $this->assertEquals('prison', $response->getName());
    }

    public function test_movies()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('keyword/378/movies'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('keywords/movies')));
        $response = $this->repository->getMovies(378);
        $this->assertEquals('Escape Plan 2: Hades', $response->getResults()[0]->getTitle());
        $this->assertEquals(833, $response->getTotalResults());
    }
}
