<?php

namespace Chiiya\Tmdb\Resources;

class Collections extends AbstractResource
{
    /**
     * Get collection details by id.
     *
     * @see https://developers.themoviedb.org/3/collections/get-collection-details
     *
     * @param int|string $id
     */
    public function getCollection($id, array $parameters = []): array
    {
        return $this->get('collection/'.$id, $parameters);
    }

    /**
     * Get the images for a collection by id.
     *
     * @see https://developers.themoviedb.org/3/collections/get-collection-images
     *
     * @param int|string $id
     */
    public function getImages($id, array $parameters = []): array
    {
        return $this->get('collection/'.$id.'/images', $parameters);
    }

    /**
     * Get the list translations for a collection by id.
     *
     * @see https://developers.themoviedb.org/3/collections/get-collection-translations
     *
     * @param int|string $id
     */
    public function getTranslations($id, array $parameters = []): array
    {
        return $this->get('collection/'.$id.'/translations', $parameters);
    }
}
