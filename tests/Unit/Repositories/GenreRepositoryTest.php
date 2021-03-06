<?php

namespace Chiiya\Tmdb\Tests\Unit\Repositories;

use Chiiya\Tmdb\Repositories\GenreRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class GenreRepositoryTest extends ApiTestCase
{
    /** @var GenreRepository */
    protected $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new GenreRepository($this->client);
    }

    public function test_movie_genres()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('genre/movie/list'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('genres/movies')));
        $response = $this->repository->getMovieGenres();
        $this->assertEquals(16, $response[2]->getId());
        $this->assertEquals('Animation', $response[2]->getName());
    }

    public function test_tv_genres()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('genre/tv/list'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('genres/tv')));
        $response = $this->repository->getTvGenres();
        $this->assertEquals(35, $response[2]->getId());
        $this->assertEquals('Comedy', $response[2]->getName());
    }
}
