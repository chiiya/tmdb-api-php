<?php

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Models\Person\CastMember;
use Chiiya\Tmdb\Models\Person\CrewMember;
use Chiiya\Tmdb\Models\Person\MovieCastMember;
use Chiiya\Tmdb\Models\Person\MovieCrewMember;
use Chiiya\Tmdb\Models\Person\TvCastMember;
use Chiiya\Tmdb\Models\Person\TvCrewMember;

abstract class CreditsResponse
{
    /** @var CastMember[] */
    protected $cast = [];
    /** @var CrewMember[] */
    protected $crew = [];

    /**
     * @return MovieCastMember[]|TvCastMember[]
     */
    public function getCast(): array
    {
        return $this->cast;
    }

    /**
     * @param CastMember[] $cast
     */
    public function setCast(array $cast): void
    {
        $this->cast = [];
        foreach ($cast as $castMember) {
            $this->addCastMember($castMember);
        }
    }

    /**
     * @return MovieCrewMember[]|TvCrewMember[]
     */
    public function getCrew(): array
    {
        return $this->crew;
    }

    /**
     * @param CrewMember[] $crew
     */
    public function setCrew(array $crew): void
    {
        $this->crew = [];
        foreach ($crew as $crewMember) {
            $this->addCrewMember($crewMember);
        }
    }
}
