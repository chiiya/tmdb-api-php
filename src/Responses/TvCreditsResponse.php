<?php

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Models\Person\TvCastMember;
use Chiiya\Tmdb\Models\Person\TvCrewMember;

/**
 * Class TvCreditsResponse.
 *
 * @method TvCastMember[] getCast()
 * @method TvCrewMember[] getCrew()
 */
class TvCreditsResponse extends CreditsResponse
{
    public function addCastMember(TvCastMember $credit): void
    {
        $this->cast[] = $credit;
    }

    public function addCrewMember(TvCrewMember $credit): void
    {
        $this->crew[] = $credit;
    }
}
