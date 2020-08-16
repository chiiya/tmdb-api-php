<?php

namespace Chiiya\Tmdb\Resources;

class People extends AbstractResource
{
    /**
     * Get the movie credits for a person.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-movie-credits
     *
     * @param int|string $id
     */
    public function getMovieCredits($id, array $parameters = []): array
    {
        return $this->get('person/'.$id.'/movie_credits', $parameters);
    }

    /**
     * Get the TV show credits for a person.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-tv-credits
     *
     * @param int|string $id
     */
    public function getTvCredits($id, array $parameters = []): array
    {
        return $this->get('person/'.$id.'/tv_credits', $parameters);
    }

    /**
     * Get the movie and TV credits together in a single response.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-combined-credits
     *
     * @param int|string $id
     */
    public function getCombinedCredits($id, array $parameters = []): array
    {
        return $this->get('person/'.$id.'/combined_credits', $parameters);
    }

    /**
     * Get the external ids for a person. We currently support the following external sources:
     * IMDB, Facebook, Twitter, Freebase, TVRage, Instagram.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-external-ids
     *
     * @param int|string $id
     */
    public function getExternalIds($id, array $parameters = []): array
    {
        return $this->get('person/'.$id.'/external_ids', $parameters);
    }

    /**
     * Get the images for a person.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-images
     *
     * @param int|string $id
     */
    public function getImages($id, array $parameters = []): array
    {
        return $this->get('person/'.$id.'/images', $parameters);
    }

    /**
     * Get the images that this person has been tagged in.
     *
     * @see https://developers.themoviedb.org/3/people/get-tagged-images
     *
     * @param int|string $id
     */
    public function getTaggedImages($id, array $parameters = []): array
    {
        return $this->get('person/'.$id.'/tagged_images', $parameters);
    }

    /**
     * Get a list of translations that have been created for a person.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-translations
     *
     * @param int|string $id
     */
    public function getTranslations($id, array $parameters = []): array
    {
        return $this->get('person/'.$id.'/translations', $parameters);
    }
}
