<?php

namespace Chiiya\Tmdb\Tests\Unit\Repositories;

use Chiiya\Tmdb\Query\AppendToResponse;
use Chiiya\Tmdb\Repositories\CollectionRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class CollectionRepositoryTest extends ApiTestCase
{
    protected CollectionRepository $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new CollectionRepository($this->client);
    }

    public function test_collection_details(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('collection/10'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('collections/details')));
        $collection = $this->repository->getCollection(10);
        $this->assertEquals(10, $collection->getId());
        $this->assertEquals('Star Wars Collection', $collection->getName());
        $this->assertEquals('/tdQzRSk4PXX6hzjLcQWHafYtZTI.jpg', $collection->getPosterPath());
        $this->assertEquals('The Empire Strikes Back', $collection->getParts()[1]->getTitle());
    }

    public function test_collection_details_with_appends(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('collection/10?append_to_response=images,translations'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('collections/appends')));
        $collection = $this->repository->getCollection(10, [
            new AppendToResponse([AppendToResponse::IMAGES, AppendToResponse::TRANSLATIONS]),
        ]);
        $this->assertEquals(10, $collection->getId());
        $this->assertEquals('Star Wars Collection', $collection->getName());
        $this->assertEquals('/tdQzRSk4PXX6hzjLcQWHafYtZTI.jpg', $collection->getPosterPath());
        $this->assertEquals('AE', $collection->getTranslations()[0]->getIso31661());
        $this->assertEquals('ar', $collection->getTranslations()[0]->getIso6391());
        $this->assertEquals('Star Wars (kolekce)', $collection->getTranslations()[2]->getData()->getTitle());
        $this->assertEquals('/d8duYyyC9J5T825Hg7grmaabfxQ.jpg', $collection->getBackdrops()[0]->getFilePath());
        $this->assertEquals('/tdQzRSk4PXX6hzjLcQWHafYtZTI.jpg', $collection->getPosters()[0]->getFilePath());
    }

    public function test_collection_images(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('collection/10/images'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('collections/images')));
        $images = $this->repository->getImages(10);
        $this->assertEquals('/d8duYyyC9J5T825Hg7grmaabfxQ.jpg', $images->getBackdrops()[0]->getFilePath());
        $this->assertEquals('/tdQzRSk4PXX6hzjLcQWHafYtZTI.jpg', $images->getPosters()[0]->getFilePath());
    }

    public function test_collection_translations(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('collection/10/translations'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('collections/translations')));
        $translations = $this->repository->getTranslations(10);
        $this->assertEquals('Star Wars (kolekce)', $translations[2]->getData()->getTitle());
    }
}
