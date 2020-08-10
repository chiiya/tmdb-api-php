<?php

namespace Chiiya\Tmdb\Tests\Unit\Repositories;

use Chiiya\Tmdb\Repositories\ConfigurationRepository;
use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class ConfigurationRepositoryTest extends ApiTestCase
{
    /** @var ConfigurationRepository */
    protected $repository;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = new ConfigurationRepository($this->client);
    }

    public function test_api_configuration(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('configuration'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('configuration/configuration')));
        $response = $this->repository->getApiConfiguration();
        $this->assertEquals('adult', $response->getChangeKeys()[0]);
        $this->assertEquals('http://image.tmdb.org/t/p/', $response->getImages()->getBaseUrl());
    }

    public function test_countries(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('configuration/countries'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('configuration/countries')));
        $response = $this->repository->getCountries();
        $this->assertEquals('AD', $response[0]->getIso31661());
        $this->assertEquals('Andorra', $response[0]->getEnglishName());
    }

    public function test_jobs(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('configuration/jobs'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('configuration/jobs')));
        $response = $this->repository->getJobs();
        $this->assertEquals('Lighting', $response[0]->getDepartment());
        $this->assertEquals('Lighting Technician', $response[0]->getJobs()[0]);
    }

    public function test_languages(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('configuration/languages'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('configuration/languages')));
        $response = $this->repository->getLanguages();
        $this->assertEquals('No Language', $response[0]->getName());
    }

    public function test_primary_translations(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('configuration/primary_translations'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('configuration/primary_translations')));
        $response = $this->repository->getPrimaryTranslations();
        $this->assertEquals('ar-AE', $response[0]);
    }

    public function test_timezones(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('configuration/timezones'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('configuration/timezones')));
        $response = $this->repository->getTimezones();
        $this->assertEquals('AD', $response[0]->getIso31661());
    }
}
