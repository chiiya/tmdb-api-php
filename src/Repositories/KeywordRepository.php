<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Models\Keyword;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class KeywordRepository extends AbstractRepository
{
    /**
     * Get details for a given keyword.
     *
     * @see https://developers.themoviedb.org/3/keywords/get-keyword-details
     *
     * @param string|int $id
     *
     * @throws ExceptionInterface
     */
    public function getDetails($id, array $parameters = []): Keyword
    {
        $response = $this->getResource()->getDetails($id, $parameters);

        return $this->serializer->denormalize($response, Keyword::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getResource()
    {
        return $this->getClient()->keywords();
    }
}
