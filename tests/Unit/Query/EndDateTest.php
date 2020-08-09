<?php

namespace Chiiya\Tmdb\Tests\Unit\Query;

use Chiiya\Tmdb\Query\EndDate;
use PHPUnit\Framework\TestCase;

class EndDateTest extends TestCase
{
    public function test_that_it_handles_date_object(): void
    {
        $query = new EndDate(new \DateTime('2020-10-01'));
        $this->assertEquals('2020-10-01', $query->getValue());
        $this->assertEquals('end_date', $query->getKey());
    }

    public function test_that_it_handles_string(): void
    {
        $query = new EndDate('2020-10-01');
        $this->assertEquals('2020-10-01', $query->getValue());
        $this->assertEquals('end_date', $query->getKey());
    }
}
