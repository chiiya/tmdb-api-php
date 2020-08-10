<?php

namespace Chiiya\Tmdb\Models\Configuration;

use Chiiya\Tmdb\Models\Entity;

class Job extends Entity
{
    /** @var string */
    private $department;
    /** @var string[] */
    private $jobs;

    public function getDepartment(): string
    {
        return $this->department;
    }

    public function setDepartment(string $department): Job
    {
        $this->department = $department;

        return $this;
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
    public function setJobs(array $jobs): Job
    {
        $this->jobs = $jobs;

        return $this;
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
