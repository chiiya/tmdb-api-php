<?php

namespace Chiiya\Tmdb\Responses;

use Chiiya\Tmdb\Models\Person\MovieCastMember;
use Chiiya\Tmdb\Models\Person\MovieCrewMember;

/**
 * Class MovieCreditsResponse.
 *
 * @method MovieCastMember[] getCast()
 * @method MovieCrewMember[] getCrew()
 */
class MovieCreditsResponse extends CreditsResponse
{
    public function addCastMember(MovieCastMember $credit): void
    {
        $this->cast[] = $credit;
    }

    public function addCrewMember(MovieCrewMember $credit): void
    {
        $this->crew[] = $credit;
    }
}
