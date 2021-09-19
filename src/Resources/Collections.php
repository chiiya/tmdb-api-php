<?php

namespace Chiiya\Tmdb\Resources;

use GuzzleHttp\Exception\GuzzleException;

class Collections extends AbstractResource
{
    /**
     * Get collection details by id.
     *
     * @see https://developers.themoviedb.org/3/collections/get-collection-details
     * @throws GuzzleException
     */
    public function getCollection(int|string $id, array $parameters = []): array
    {
        return $this->get('collection/'.$id, $parameters);
    }

    /**
     * Get the images for a collection by id.
     *
     * @see https://developers.themoviedb.org/3/collections/get-collection-images
     * @throws GuzzleException
     */
    public function getImages(int|string $id, array $parameters = []): array
    {
        return $this->get('collection/'.$id.'/images', $parameters);
    }

    /**
     * Get the list translations for a collection by id.
     *
     * @see https://developers.themoviedb.org/3/collections/get-collection-translations
     * @throws GuzzleException
     */
    public function getTranslations(int|string $id, array $parameters = []): array
    {
        return $this->get('collection/'.$id.'/translations', $parameters);
    }
}
