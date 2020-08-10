<?php

namespace Chiiya\Tmdb\Tests\Unit\Models;

use Chiiya\Tmdb\Models\Configuration\Job;
use PHPUnit\Framework\TestCase;

class JobTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $model = $this->getModel();
        $this->assertEquals('Lighting', $model->getDepartment());
        $this->assertEquals(['Lighting Technician', 'Best Boy Electric'], $model->getJobs());
    }

    public function test_to_array(): void
    {
        $model = $this->getModel();
        $this->assertEquals([
            'department' => 'Lighting',
            'jobs' => ['Lighting Technician', 'Best Boy Electric'],
        ], $model->toArray());
    }

    public static function getModel(): Job
    {
        $model = new Job();
        $model
            ->setDepartment('Lighting')
            ->setJobs(['Lighting Technician', 'Best Boy Electric']);

        return $model;
    }
}
