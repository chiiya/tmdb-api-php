<?php

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Models\Person\CastMember;
use Chiiya\Tmdb\Models\Person\CrewMember;

class CombinedCreditsResponse extends CreditsResponse
{
    public function addCastMember(CastMember $credit): void
    {
        $this->cast[] = $credit;
    }

    public function addCrewMember(CrewMember $credit): void
    {
        $this->crew[] = $credit;
    }
}
