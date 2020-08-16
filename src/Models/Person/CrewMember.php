<?php

namespace Chiiya\Tmdb\Models\Person;

use Chiiya\Tmdb\Models\HasMediaAttributes;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

/**
 * @DiscriminatorMap(typeProperty="media_type", mapping={
 *    "movie"="Chiiya\Tmdb\Models\Person\MovieCrewMember",
 *    "tv"="Chiiya\Tmdb\Models\Person\TvCrewMember"
 * })
 */
abstract class CrewMember extends Credit
{
    use HasMediaAttributes;

    private string $department;
    private string $job;

    public function getDepartment(): string
    {
        return $this->department;
    }

    public function setDepartment(string $department): void
    {
        $this->department = $department;
    }

    public function getJob(): string
    {
        return $this->job;
    }

    public function setJob(string $job): void
    {
        $this->job = $job;
    }

    public function toArray(): array
    {
        return array_merge($this->getMediaAttributes(), [
            'credit_id' => $this->getCreditId(),
            'department' => $this->getDepartment(),
            'job' => $this->getJob(),
        ]);
    }
}
