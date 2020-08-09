<?php

namespace Chiiya\Tmdb\Tests\Unit\Query;

use Chiiya\Tmdb\Query\StartDate;
use PHPUnit\Framework\TestCase;

class StartDateTest extends TestCase
{
    public function test_that_it_handles_date_object(): void
    {
        $query = new StartDate(new \DateTime('2020-10-01'));
        $this->assertEquals('2020-10-01', $query->getValue());
        $this->assertEquals('start_date', $query->getKey());
    }

    public function test_that_it_handles_string(): void
    {
        $query = new StartDate('2020-10-01');
        $this->assertEquals('2020-10-01', $query->getValue());
        $this->assertEquals('start_date', $query->getKey());
    }
}
