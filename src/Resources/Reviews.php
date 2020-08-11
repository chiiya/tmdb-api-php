<?php

namespace Chiiya\Tmdb\Resources;

class Reviews extends AbstractResource
{
    /**
     * Get details for the given review.
     *
     * @see https://developers.themoviedb.org/3/reviews/get-review-details
     */
    public function getReview(string $id, array $parameters = []): array
    {
        return $this->get('review/'.$id, $parameters);
    }
}
