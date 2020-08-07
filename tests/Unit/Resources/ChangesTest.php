<?php

namespace Chiiya\Tmdb\Tests\Unit\Resources;

use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class ChangesTest extends ApiTestCase
{
    public function test_movie_changes(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('movie/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('changes/movies')));
        $response = $this->client->changes()->getMovieChanges();
        $this->assertEquals(21949, $response['results'][0]['id']);
    }

    public function test_tv_changes(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('tv/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('changes/tv')));
        $response = $this->client->changes()->getTvChanges();
        $this->assertEquals(6249, $response['results'][0]['id']);
    }

    public function test_person_changes(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/changes'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('changes/person')));
        $response = $this->client->changes()->getPersonChanges();
        $this->assertEquals(1572271, $response['results'][0]['id']);
    }
}
