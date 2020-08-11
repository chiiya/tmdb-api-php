<?php

namespace Chiiya\Tmdb\Tests\Unit\Repositories;

use Chiiya\Tmdb\Query\AppendToResponse;
use Chiiya\Tmdb\Repositories\NetworkRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class NetworkRepositoryTest extends ApiTestCase
{
    /** @var NetworkRepository */
    protected $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new NetworkRepository($this->client);
    }

    public function test_network_details(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('network/1'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('networks/details')));
        $company = $this->repository->getNetwork(1);
        $this->assertEquals(1, $company->getId());
        $this->assertEquals('Fuji TV', $company->getName());
    }

    public function test_network_details_with_appends(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('network/1?append_to_response=alternative_names,images'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('networks/appends')));
        $company = $this->repository->getNetwork(1, [
            new AppendToResponse([AppendToResponse::ALTERNATIVE_NAMES, AppendToResponse::IMAGES]),
        ]);
        $this->assertEquals(1, $company->getId());
        $this->assertEquals('Fuji TV', $company->getName());
        $this->assertEquals('Fuji Television', $company->getAlternativeNames()[0]->getName());
        $this->assertEquals('/yS5UJjsSdZXML0YikWTYYHLPKhQ.png', $company->getLogos()[0]->getFilePath());
        $this->assertFalse($company->getLogos()[0]->isPNG());
        $this->assertTrue($company->getLogos()[0]->isSVG());
    }

    public function test_company_images(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('network/1/images'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('networks/images')));
        $images = $this->repository->getImages(1);
        $this->assertEquals('/yS5UJjsSdZXML0YikWTYYHLPKhQ.png', $images[0]->getFilePath());
    }

    public function test_company_alternative_names(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('network/1/alternative_names'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('networks/names')));
        $names = $this->repository->getAlternativeNames(1);
        $this->assertEquals('Fuji Television', $names[0]->getName());
    }
}
