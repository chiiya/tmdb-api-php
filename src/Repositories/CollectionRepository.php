<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Common\ResponseHelper;
use Chiiya\Tmdb\Models\Collection;
use Chiiya\Tmdb\Models\Translation;
use Chiiya\Tmdb\Responses\CollectionImagesResponse;

class CollectionRepository extends AbstractRepository
{
    /**
     * Get collection details by id.
     *
     * @see https://developers.themoviedb.org/3/collections/get-collection-details
     *
     * @param int|string $id
     */
    public function getCollection($id, array $parameters = []): Collection
    {
        $response = ResponseHelper::flatten($this->getResource()->getCollection($id, $parameters));

        return $this->serializer->denormalize($response, Collection::class);
    }

    /**
     * Get the images for a collection by id.
     *
     * @see https://developers.themoviedb.org/3/collections/get-collection-images
     *
     * @param int|string $id
     */
    public function getImages($id, array $parameters = []): CollectionImagesResponse
    {
        $response = $this->getResource()->getImages($id, $parameters);

        return $this->serializer->denormalize($response, CollectionImagesResponse::class);
    }

    /**
     * Get the list translations for a collection by id.
     *
     * @see https://developers.themoviedb.org/3/collections/get-collection-translations
     *
     * @param int|string $id
     *
     * @return Translation[]
     */
    public function getTranslations($id, array $parameters = []): array
    {
        $response = $this->getResource()->getTranslations($id, $parameters)['translations'];

        return $this->serializer->denormalize($response, 'Chiiya\Tmdb\Models\Translation[]');
    }

    /**
     * {@inheritdoc}
     */
    protected function getResource()
    {
        return $this->getClient()->collections();
    }
}
