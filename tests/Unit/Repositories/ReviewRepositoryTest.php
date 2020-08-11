<?php

namespace Chiiya\Tmdb\Tests\Unit\Repositories;

use Chiiya\Tmdb\Repositories\ReviewRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class ReviewRepositoryTest extends ApiTestCase
{
    /** @var ReviewRepository */
    protected $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new ReviewRepository($this->client);
    }

    public function test_network_details(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('review/5d63da037f6c8d03acedc04b'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('reviews/details')));
        $review = $this->repository->getReview('5d63da037f6c8d03acedc04b');
        $this->assertEquals('5d63da037f6c8d03acedc04b', $review->getId());
        $this->assertEquals('Blade Runner 2049', $review->getMediaTitle());
    }
}
