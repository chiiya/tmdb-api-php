<?php

namespace Chiiya\Tmdb\Tests\Unit\Repositories;

use Chiiya\Tmdb\Query\AppendToResponse;
use Chiiya\Tmdb\Repositories\CompanyRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class CompanyRepositoryTest extends ApiTestCase
{
    /** @var CompanyRepository */
    protected $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new CompanyRepository($this->client);
    }

    public function test_company_details(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('company/3268'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('companies/details')));
        $company = $this->repository->getCompany(3268);
        $this->assertEquals(3268, $company->getId());
        $this->assertEquals('HBO', $company->getName());
        $this->assertEquals('US', $company->getOriginCountry());
    }

    public function test_company_details_with_appends(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('company/3268?append_to_response=alternative_names,images'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('companies/appends')));
        $company = $this->repository->getCompany(3268, [
            new AppendToResponse([AppendToResponse::ALTERNATIVE_NAMES, AppendToResponse::IMAGES]),
        ]);
        $this->assertEquals(3268, $company->getId());
        $this->assertEquals('HBO', $company->getName());
        $this->assertEquals('US', $company->getOriginCountry());
        $this->assertEquals('Home Box Office', $company->getAlternativeNames()[0]->getName());
        $this->assertEquals('/tuomPhY2UtuPTqqFnKMVHvSb724.png', $company->getLogos()[0]->getFilePath());
        $this->assertFalse($company->getLogos()[0]->isPNG());
        $this->assertTrue($company->getLogos()[0]->isSVG());
    }

    public function test_company_images(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('company/3268/images'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('companies/images')));
        $images = $this->repository->getImages(3268);
        $this->assertEquals('/tuomPhY2UtuPTqqFnKMVHvSb724.png', $images[0]->getFilePath());
    }

    public function test_company_alternative_names(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('company/3268/alternative_names'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('companies/names')));
        $names = $this->repository->getAlternativeNames(3268);
        $this->assertEquals('Home Box Office', $names[0]->getName());
    }
}
