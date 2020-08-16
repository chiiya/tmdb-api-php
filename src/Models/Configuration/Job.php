<?php

namespace Chiiya\Tmdb\Models\Configuration;

use Chiiya\Tmdb\Models\Entity;

class Job extends Entity
{
    private string $department;
    /** @var string[] */
    private array $jobs;

    public function getDepartment(): string
    {
        return $this->department;
    }

    public function setDepartment(string $department): void
    {
        $this->department = $department;
    }

    /**
     * @return string[]
     */
    public function getJobs(): array
    {
        return $this->jobs;
    }

    /**
     * @param string[] $jobs
     */
    public function setJobs(array $jobs): void
    {
        $this->jobs = $jobs;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'department' => $this->getDepartment(),
            'jobs' => $this->getJobs(),
        ];
    }
}
