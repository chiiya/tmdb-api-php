<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Models\Review;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class ReviewRepository extends AbstractRepository
{
    /**
     * Get details for the given review.
     *
     * @see https://developers.themoviedb.org/3/reviews/get-review-details
     *
     * @throws ExceptionInterface
     */
    public function getReview(string $id, array $parameters = []): Review
    {
        $response = $this->getResource()->getReview($id, $parameters);

        return $this->serializer->denormalize($response, Review::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getResource()
    {
        return $this->getClient()->reviews();
    }
}
