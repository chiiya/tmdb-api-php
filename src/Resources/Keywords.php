<?php

namespace Chiiya\Tmdb\Resources;

class Keywords extends AbstractResource
{
    /**
     * Get details for a given keyword.
     *
     * @see https://developers.themoviedb.org/3/keywords/get-keyword-details
     *
     * @param string|int $id
     */
    public function getDetails($id, array $parameters = []): array
    {
        return $this->get('keyword/'.$id, $parameters);
    }
}
