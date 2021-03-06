<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Models\Configuration\Configuration;
use Chiiya\Tmdb\Models\Configuration\Country;
use Chiiya\Tmdb\Models\Configuration\Job;
use Chiiya\Tmdb\Models\Configuration\Language;
use Chiiya\Tmdb\Models\Configuration\Timezone;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class ConfigurationRepository extends AbstractRepository
{
    /**
     * Get the system wide configuration information. Some elements of the API require some knowledge of
     * this configuration data. The purpose of this is to try and keep the actual API responses as
     * light as possible. It is recommended you cache this data within your application and check
     * for updates every few days.
     *
     * This method currently holds the data relevant to building image URLs as well as the change key map.
     *
     * To build an image URL, you will need 3 pieces of data. The base_url, size and file_path. Simply
     * combine them all and you will have a fully qualified URL. Here’s an example URL:
     * https://image.tmdb.org/t/p/w500/8uO0gUM8aNqYLs1OsTBQiXu0fEv.jpg
     *
     * The configuration method also contains the list of change keys which can be useful if you are
     * building an app that consumes data from the change feed.
     *
     * @see https://developers.themoviedb.org/3/configuration/get-api-configuration
     *
     * @throws ExceptionInterface
     */
    public function getApiConfiguration(array $parameters = []): Configuration
    {
        $response = $this->getResource()->getApiConfiguration($parameters);

        return $this->serializer->denormalize($response, Configuration::class);
    }

    /**
     * Get the list of countries (ISO 3166-1 tags) used throughout TMDb.
     *
     * @see https://developers.themoviedb.org/3/configuration/get-countries
     *
     * @throws ExceptionInterface
     *
     * @return Country[]
     */
    public function getCountries(array $parameters = []): array
    {
        $response = $this->getResource()->getCountries($parameters);

        return $this->serializer->denormalize($response, 'Chiiya\Tmdb\Models\Configuration\Country[]');
    }

    /**
     * Get a list of the jobs and departments we use on TMDb.
     *
     * @see https://developers.themoviedb.org/3/configuration/get-jobs
     *
     * @throws ExceptionInterface
     *
     * @return Job[]
     */
    public function getJobs(array $parameters = []): array
    {
        $response = $this->getResource()->getJobs($parameters);

        return $this->serializer->denormalize($response, 'Chiiya\Tmdb\Models\Configuration\Job[]');
    }

    /**
     * Get the list of languages (ISO 639-1 tags) used throughout TMDb.
     *
     * @see https://developers.themoviedb.org/3/configuration/get-languages
     *
     * @throws ExceptionInterface
     *
     * @return Language[]
     */
    public function getLanguages(array $parameters = []): array
    {
        $response = $this->getResource()->getLanguages($parameters);

        return $this->serializer->denormalize($response, 'Chiiya\Tmdb\Models\Configuration\Language[]');
    }

    /**
     * Get a list of the officially supported translations on TMDb.
     * While it's technically possible to add a translation in any one of the languages we have added to
     * TMDb (we don't restrict content), the ones listed in this method are the ones we also support for
     * localizing the website with which means they are what we refer to as the "primary" translations.
     *
     * These are all specified as IETF tags to identify the languages we use on TMDb. There is one
     * exception which is image languages. They are currently only designated by a ISO-639-1 tag.
     * This is a planned upgrade for the future.
     *
     * @see https://developers.themoviedb.org/3/configuration/get-primary-translations
     *
     * @return string[]
     */
    public function getPrimaryTranslations(array $parameters = []): array
    {
        return $this->getResource()->getPrimaryTranslations($parameters);
    }

    /**
     * Get the list of timezones used throughout TMDb.
     *
     * @see https://developers.themoviedb.org/3/configuration/get-timezones
     *
     * @throws ExceptionInterface
     *
     * @return Timezone[]
     */
    public function getTimezones(array $parameters = []): array
    {
        $response = $this->getResource()->getTimezones($parameters);

        return $this->serializer->denormalize($response, 'Chiiya\Tmdb\Models\Configuration\Timezone[]');
    }

    /**
     * {@inheritdoc}
     */
    protected function getResource()
    {
        return $this->getClient()->configuration();
    }
}
