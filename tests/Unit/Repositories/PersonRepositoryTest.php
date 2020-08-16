<?php

namespace Chiiya\Tmdb\Tests\Unit\Repositories;

use Chiiya\Tmdb\Models\Movie\Movie;
use Chiiya\Tmdb\Models\Person\MovieCastMember;
use Chiiya\Tmdb\Models\Person\MovieCrewMember;
use Chiiya\Tmdb\Models\Person\TvCastMember;
use Chiiya\Tmdb\Models\Person\TvCrewMember;
use Chiiya\Tmdb\Repositories\PersonRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class PersonRepositoryTest extends ApiTestCase
{
    /** @var PersonRepository */
    protected $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new PersonRepository($this->client);
    }

    public function test_movie_credits(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/287/movie_credits'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/movie_credits')));
        $response = $this->repository->getMovieCredits(287);
        $this->assertEquals('Rusty Ryan', $response->getCast()[0]->getCharacter());
        $this->assertEquals('Thanks', $response->getCrew()[0]->getJob());
    }

    public function test_tv_credits(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/287/tv_credits'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/tv_credits')));
        $response = $this->repository->getTvCredits(287);
        $this->assertEquals('Growing Pains', $response->getCast()[0]->getOriginalName());
        $this->assertEquals('Production', $response->getCrew()[0]->getDepartment());
    }

    public function test_combined_credits(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/287/combined_credits'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/combined_credits')));
        $response = $this->repository->getCombinedCredits(287);
        $this->assertInstanceOf(MovieCastMember::class, $response->getCast()[0]);
        $this->assertEquals('Rusty Ryan', $response->getCast()[0]->getCharacter());
        $this->assertInstanceOf(TvCastMember::class, $response->getCast()[1]);
        $this->assertEquals('Growing Pains', $response->getCast()[1]->getOriginalName());
        $this->assertInstanceOf(MovieCrewMember::class, $response->getCrew()[0]);
        $this->assertEquals('Thanks', $response->getCrew()[0]->getJob());
        $this->assertInstanceOf(TvCrewMember::class, $response->getCrew()[1]);
        $this->assertEquals('FEUD', $response->getCrew()[1]->getOriginalName());
    }

    public function test_person_external_ids(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/287/external_ids'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/external_ids')));
        $response = $this->repository->getExternalIds(287);
        $this->assertEquals('nm0000093', $response->getImdbId());
    }

    public function test_person_images(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/287/images'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/images')));
        $images = $this->repository->getImages(287);
        $this->assertEquals(1600, $images[0]->getWidth());
    }

    public function test_person_tagged_images(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/31/tagged_images'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/tagged_images')));
        $images = $this->repository->getTaggedImages(31);
        $this->assertEquals(2100, $images->getResults()[0]->getHeight());
        $this->assertInstanceOf(Movie::class, $images->getResults()[0]->getMedia());
        $this->assertEquals('A Beautiful Day in the Neighborhood', $images->getResults()[0]->getMedia()->getOriginalTitle());
    }

    public function test_person_translations(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('person/287/translations'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('people/translations')));
        $translations = $this->repository->getTranslations(287);
        $this->assertStringStartsWith('William Bradley', $translations[2]->getData()->getBiography());
    }
}