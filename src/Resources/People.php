<?php

namespace Chiiya\Tmdb\Resources;

class People extends AbstractResource
{
    /**
     * Get the primary person details by id.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-details
     *
     * @param int|string $id
     */
    public function getPerson($id, array $parameters = []): array
    {
        return $this->get('person/'.$id, $parameters);
    }

    /**
     * Get the changes for a person. By default only the last 24 hours are returned.
     *
     * You can query up to 14 days in a single query by using the start_date and end_date query parameters.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-changes
     *
     * @param int|string $id
     */
    public function getChanges($id, array $parameters = []): array
    {
        return $this->get('person/'.$id.'/changes', $parameters);
    }

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
