<?php

namespace Chiiya\Tmdb\Models\Person;

use Chiiya\Tmdb\Models\Tv\HasTvAttributes;

class TvCrewMember extends CrewMember
{
    use HasTvAttributes;

    private int $episodeCount;

    public function getEpisodeCount(): int
    {
        return $this->episodeCount;
    }

    public function setEpisodeCount(int $episodeCount): void
    {
        $this->episodeCount = $episodeCount;
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'episode_count' => $this->getEpisodeCount(),
        ]);
    }
}
