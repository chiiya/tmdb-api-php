<?php

namespace Chiiya\Tmdb\Tests\Fixtures;

use Chiiya\Tmdb\Models\Person\TranslationData;

class Attributes
{
    use HasCollectionAttributes;
    use HasConfigurationAttributes;

    public static function movieAttributes(): array
    {
        return [
            'id' => 1891,
            'title' => 'The Empire Strikes Back',
            'backdrop_path' => 'backdrop.jpg',
            'poster_path' => 'poster.jpg',
            'genre_ids' => [12, 28],
            'original_language' => 'en',
            'original_title' => 'The Empire Strikes Back',
            'release_date' => '1980-05-20',
            'overview' => 'Lorem Ipsum',
            'adult' => false,
            'video' => false,
            'vote_count' => 11858,
            'vote_average' => 8.4,
            'popularity' => 25.279,
        ];
    }

    public static function tvAttributes(): array
    {
        return [
            'id' => 1399,
            'backdrop_path' => 'backdrop.jpg',
            'poster_path' => 'poster.jpg',
            'genre_ids' => [10765, 18, 10759],
            'original_language' => 'en',
            'overview' => 'Lorem Ipsum',
            'vote_count' => 4682,
            'vote_average' => 8.2,
            'popularity' => 53.516,
            'name' => 'Game of Thrones',
            'original_name' => 'Game of Thrones',
            'origin_country' => ['US'],
            'first_air_date' => '2011-04-17',
        ];
    }

    public static function imageAttributes(): array
    {
        return [
            'aspect_ratio' => 1.0,
            'file_path' => 'poster.jpg',
            'height' => 200,
            'width' => 200,
            'vote_count' => 10,
            'vote_average' => 5.0,
        ];
    }

    public static function logoAttributes(): array
    {
        return array_merge(Attributes::imageAttributes(), [
            'id' => '111',
            'file_type' => '.svg',
        ]);
    }

    public static function alternativeNameAttributes(): array
    {
        return [
            'name' => 'Home Box Office',
            'type' => 'Long',
        ];
    }

    public static function genreAttributes(): array
    {
        return [
            'id' => 35,
            'name' => 'Comedy',
        ];
    }

    public static function keywordAttributes(): array
    {
        return [
            'id' => 378,
            'name' => 'prison',
        ];
    }

    public static function certificationAttributes(): array
    {
        return [
            'certification' => 'G',
            'meaning' => 'All ages admitted.',
            'order' => 1,
        ];
    }

    public static function personExternalIdsAttributes(): array
    {
        return [
            'twitter_id' => 'abcd',
            'facebook_id' => 'efgh',
            'imdb_id' => 'nm0000093',
            'freebase_id' => '/en/brad_pitt',
            'freebase_mid' => '/m/0c6qh',
            'instagram_id' => 'ijkl',
            'tvrage_id' => '59436',
        ];
    }

    public static function personTranslationDataAttributes(): array
    {
        return [
            'biography' => 'Lorem Ipsum',
        ];
    }

    public static function personTranslationAttributes(): array
    {
        return [
            'iso_3166_1' => 'DE',
            'iso_639_1' => 'de',
            'name' => 'Deutsch',
            'english_name' => 'German',
            'data' => new TranslationData(self::personTranslationDataAttributes()),
        ];
    }

    public static function changeItemAttributes(): array
    {
        return [
            'id' => '5f41714fe8999b00354bb3ba',
            'action' => 'deleted',
            'time' => '2020-08-22 19:26:07 UTC',
            'value' => null,
            'original_value' => [
                'profile' => [
                    'file_path' => '/kcZJAEj9IjUloJVoM41DPDKMn8W.jpg',
                ],
            ],
        ];
    }
}
