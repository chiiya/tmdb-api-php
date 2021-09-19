<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Configuration;

use Chiiya\Tmdb\Models\Configuration\Job;
use PHPUnit\Framework\TestCase;

class JobTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new Job($attributes);
        $this->assertEquals($attributes['department'], $model->getDepartment());
        $this->assertEquals($attributes['jobs'], $model->getJobs());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new Job($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        return [
            'department' => 'Lighting',
            'jobs' => ['Lighting Technician', 'Best Boy Electric'],
        ];
    }
}
