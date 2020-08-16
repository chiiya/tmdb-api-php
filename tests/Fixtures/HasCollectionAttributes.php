<?php

namespace Chiiya\Tmdb\Tests\Fixtures;

use Chiiya\Tmdb\Models\Collection\TranslationData;

trait HasCollectionAttributes
{
    public static function collectionTranslationData(): array
    {
        return [
            'title' => 'Star Wars Filmreihe',
            'overview' => 'Lorem Ipsum.',
            'homepage' => 'http://example.org',
        ];
    }

    public static function collectionTranslationAttributes(): array
    {
        return [
            'iso_3166_1' => 'DE',
            'iso_639_1' => 'de',
            'name' => 'Deutsch',
            'english_name' => 'German',
            'data' => new TranslationData(self::collectionTranslationData()),
        ];
    }
}
