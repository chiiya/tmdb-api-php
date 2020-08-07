<?php

namespace Chiiya\Tmdb\Tests\Unit\Resources;

use Chiiya\Tmdb\Tests\ApiTestCase;
use GuzzleHttp\Psr7\Response;

class CertificationsTest extends ApiTestCase
{
    public function test_movie_certifications(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('certification/movie/list'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('certifications/movies')));
        $response = $this->client->certifications()->getMovieCertifications();
        $this->assertEquals('G', $response['certifications']['US'][0]['certification']);
    }

    public function test_tv_certifications(): void
    {
        $this->guzzler->expects($this->once())
            ->endpoint($this->url('certification/tv/list'), 'GET')
            ->will(new Response(200, [], $this->getMockResponse('certifications/tv')));
        $response = $this->client->certifications()->getTvCertifications();
        $this->assertEquals('TV-PG', $response['certifications']['US'][4]['certification']);
    }
}
