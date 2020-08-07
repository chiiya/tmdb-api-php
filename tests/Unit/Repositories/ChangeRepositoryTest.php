<?php

namespace Chiiya\Tmdb\Tests\Unit\Repositories;

use Chiiya\Tmdb\Repositories\ChangeRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class ChangeRepositoryTest extends ApiTestCase
{
    /** @var ChangeRepository */
    protected $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new ChangeRepository($this->client);
    }

    public function test_movie_changes()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('changes/movies')));
        $response = $this->repository->getMovieChanges();
        $this->assertEquals(21949, $response->getResults()[0]->getId());
        $this->assertEquals(1, $response->getPage());
        $this->assertEquals(1, $response->getTotalPages());
        $this->assertEquals(1, $response->getTotalResults()); // Uhm, okay.
    }

    public function test_tv_changes()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('changes/tv')));
        $response = $this->repository->getTvChanges();
        $this->assertEquals(6249, $response->getResults()[0]->getId());
        $this->assertEquals(1, $response->getPage());
    }

    public function test_person_changes()
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('changes/person')));
        $response = $this->repository->getPersonChanges();
        $this->assertEquals(1572271, $response->getResults()[0]->getId());
        $this->assertEquals(1, $response->getPage());
    }
}
