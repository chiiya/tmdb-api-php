<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Common\ResponseHelper;
use Chiiya\Tmdb\Models\Change;
use Chiiya\Tmdb\Models\Image\ProfileImage;
use Chiiya\Tmdb\Models\Person\ExternalIds;
use Chiiya\Tmdb\Models\Person\Person;
use Chiiya\Tmdb\Models\Person\PersonDetails;
use Chiiya\Tmdb\Models\Person\Translation;
use Chiiya\Tmdb\Responses\CombinedCreditsResponse;
use Chiiya\Tmdb\Responses\MovieCreditsResponse;
use Chiiya\Tmdb\Responses\PopularPeopleResponse;
use Chiiya\Tmdb\Responses\TaggedImagesResponse;
use Chiiya\Tmdb\Responses\TvCreditsResponse;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class PersonRepository extends AbstractRepository
{
    /**
     * Get the primary person details by id.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-details
     *
     * @param int|string $id
     *
     * @throws ExceptionInterface
     */
    public function getPerson($id, array $parameters = []): PersonDetails
    {
        $response = ResponseHelper::normalizeDiscriminators(ResponseHelper::flatten($this->getResource()->getPerson($id, $parameters)));

        return $this->serializer->denormalize($response, PersonDetails::class);
    }

    /**
     * Get the changes for a person. By default only the last 24 hours are returned.
     *
     * You can query up to 14 days in a single query by using the start_date and end_date query parameters.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-changes
     *
     * @param int|string $id
     *
     * @throws ExceptionInterface
     *
     * @return Change[]
     */
    public function getChanges($id, array $parameters = []): array
    {
        $response = $this->getResource()->getChanges($id, $parameters)['changes'] ?? [];

        return $this->serializer->denormalize($response, 'Chiiya\Tmdb\Models\Change[]');
    }

    /**
     * Get the movie credits for a person.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-movie-credits
     *
     * @param int|string $id
     *
     * @throws ExceptionInterface
     */
    public function getMovieCredits($id, array $parameters = []): MovieCreditsResponse
    {
        $response = $this->getResource()->getMovieCredits($id, $parameters);

        return $this->serializer->denormalize($response, MovieCreditsResponse::class);
    }

    /**
     * Get the TV show credits for a person.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-tv-credits
     *
     * @param int|string $id
     *
     * @throws ExceptionInterface
     */
    public function getTvCredits($id, array $parameters = []): TvCreditsResponse
    {
        $response = $this->getResource()->getTvCredits($id, $parameters);

        return $this->serializer->denormalize($response, TvCreditsResponse::class);
    }

    /**
     * Get the movie and TV credits together in a single response.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-combined-credits
     *
     * @param int|string $id
     *
     * @throws ExceptionInterface
     */
    public function getCombinedCredits($id, array $parameters = []): CombinedCreditsResponse
    {
        $response = $this->getResource()->getCombinedCredits($id, $parameters);

        return $this->serializer->denormalize($response, CombinedCreditsResponse::class);
    }

    /**
     * Get the external ids for a person. We currently support the following external sources:
     * IMDB, Facebook, Twitter, Freebase, TVRage, Instagram.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-external-ids
     *
     * @param int|string $id
     *
     * @throws ExceptionInterface
     */
    public function getExternalIds($id, array $parameters = []): ExternalIds
    {
        $response = $this->getResource()->getExternalIds($id, $parameters);

        return $this->serializer->denormalize($response, ExternalIds::class);
    }

    /**
     * Get the images for a person.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-images
     *
     * @param int|string $id
     *
     * @throws ExceptionInterface
     *
     * @return ProfileImage[]
     */
    public function getImages($id, array $parameters = []): array
    {
        $response = $this->getResource()->getImages($id, $parameters)['profiles'] ?? [];

        return $this->serializer->denormalize($response, 'Chiiya\Tmdb\Models\Image\ProfileImage[]');
    }

    /**
     * Get the images that this person has been tagged in.
     *
     * @see https://developers.themoviedb.org/3/people/get-tagged-images
     *
     * @param int|string $id
     *
     * @throws ExceptionInterface
     */
    public function getTaggedImages($id, array $parameters = []): TaggedImagesResponse
    {
        $response = ResponseHelper::normalizeDiscriminators($this->getResource()->getTaggedImages($id, $parameters));

        return $this->serializer->denormalize($response, TaggedImagesResponse::class);
    }

    /**
     * Get a list of translations that have been created for a person.
     *
     * @see https://developers.themoviedb.org/3/people/get-person-translations
     *
     * @param int|string $id
     *
     * @throws ExceptionInterface
     *
     * @return Translation[]
     */
    public function getTranslations($id, array $parameters = []): array
    {
        $response = $this->getResource()->getTranslations($id, $parameters)['translations'];

        return $this->serializer->denormalize($response, 'Chiiya\Tmdb\Models\Person\Translation[]');
    }

    /**
     * Get the most newly created person. This is a live response and will continuously change.
     *
     * @see https://developers.themoviedb.org/3/people/get-latest-person
     *
     * @throws ExceptionInterface
     */
    public function getLatest(array $parameters = []): Person
    {
        $response = $this->getResource()->getLatest($parameters);

        return $this->serializer->denormalize($response, Person::class);
    }

    /**
     * Get the list of popular people on TMDb. This list updates daily.
     *
     * @see https://developers.themoviedb.org/3/people/get-popular-people
     *
     * @throws ExceptionInterface
     */
    public function getPopular(array $parameters = []): PopularPeopleResponse
    {
        $response = $this->getResource()->getPopular($parameters);

        return $this->serializer->denormalize($response, PopularPeopleResponse::class);
    }

    /**
     * {@inheritdoc}
     */
    protected function getResource()
    {
        return $this->getClient()->people();
    }
}
