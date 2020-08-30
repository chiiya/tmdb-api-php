<?php

namespace Chiiya\Tmdb\Tests\Unit\Models\Person;

use Chiiya\Tmdb\Models\Change;
use Chiiya\Tmdb\Models\ChangeItem;
use Chiiya\Tmdb\Models\Image\Image;
use Chiiya\Tmdb\Models\Image\ProfileImage;
use Chiiya\Tmdb\Models\Person\ExternalIds;
use Chiiya\Tmdb\Models\Person\MovieCastMember;
use Chiiya\Tmdb\Models\Person\MovieCrewMember;
use Chiiya\Tmdb\Models\Person\PersonDetails;
use Chiiya\Tmdb\Models\Person\Translation;
use Chiiya\Tmdb\Models\Person\TvCastMember;
use Chiiya\Tmdb\Models\Person\TvCrewMember;
use Chiiya\Tmdb\Responses\CombinedCreditsResponse;
use Chiiya\Tmdb\Responses\MovieCreditsResponse;
use Chiiya\Tmdb\Responses\TaggedImagesResponse;
use Chiiya\Tmdb\Responses\TvCreditsResponse;
use Chiiya\Tmdb\Tests\Fixtures\Attributes;
use PHPUnit\Framework\TestCase;

class PersonDetailsTest extends TestCase
{
    public function test_getters_setters(): void
    {
        $attributes = $this->attributes();
        $model = new PersonDetails($attributes);
        $this->assertEquals($attributes['id'], $model->getId());
        $this->assertEquals($attributes['name'], $model->getName());
        $this->assertEquals($attributes['movie_credits'], $model->getMovieCredits());
        $this->assertEquals($attributes['tv_credits'], $model->getTvCredits());
        $this->assertEquals($attributes['combined_credits'], $model->getCombinedCredits());
        $this->assertEquals($attributes['changes'], $model->getChanges());
        $this->assertEquals($attributes['translations'], $model->getTranslations());
        $this->assertEquals($attributes['tagged_images'], $model->getTaggedImages());
        $this->assertEquals($attributes['profiles'], $model->getProfiles());
        $this->assertEquals($attributes['external_ids'], $model->getExternalIds());
    }

    public function test_to_array(): void
    {
        $attributes = $this->attributes();
        $model = new PersonDetails($attributes);
        $this->assertEquals($attributes, $model->toArray());
    }

    protected function attributes(): array
    {
        $movieCast = new MovieCastMember(array_merge(Attributes::movieAttributes(), [
            'credit_id' => '52fe4264c3a36847f801b083',
            'character' => 'Achilles',
        ]));
        $movieCrew = new MovieCrewMember(array_merge(Attributes::movieAttributes(), [
            'credit_id' => '52fe492cc3a368484e11dfe1',
            'department' => 'Production',
            'job' => 'Producer',
        ]));
        $tvCast = new TvCastMember(array_merge(Attributes::tvAttributes(), [
            'credit_id' => '52fe4264c3a36847f801b083',
            'character' => 'Achilles',
            'episode_count' => 10,
        ]));
        $tvCrew = new TvCrewMember(array_merge(Attributes::tvAttributes(), [
            'credit_id' => '52fe492cc3a368484e11dfe1',
            'department' => 'Production',
            'job' => 'Producer',
            'episode_count' => 10,
        ]));
        $movieCredits = new MovieCreditsResponse();
        $movieCredits->setCast([$movieCast]);
        $movieCredits->setCrew([$movieCrew]);
        $tvCredits = new TvCreditsResponse();
        $tvCredits->setCast([$tvCast]);
        $tvCredits->setCrew([$tvCrew]);
        $combinedCredits = new CombinedCreditsResponse();
        $combinedCredits->setCast([$movieCast, $tvCast]);
        $combinedCredits->setCrew([$movieCrew, $tvCrew]);
        $change = new Change([
            'key' => 'images',
            'items' => [new ChangeItem(Attributes::changeItemAttributes())],
        ]);
        $taggedImages = new TaggedImagesResponse();
        $taggedImages->setPage(1);
        $taggedImages->setTotalPages(1);
        $taggedImages->setTotalResults(1);
        $taggedImages->setResults([new Image(Attributes::imageAttributes())]);

        return array_merge(Attributes::personAttributes(), [
            'movie_credits' => $movieCredits,
            'tv_credits' => $tvCredits,
            'combined_credits' => $combinedCredits,
            'changes' => [$change],
            'translations' => [new Translation(Attributes::personTranslationAttributes())],
            'tagged_images' => $taggedImages,
            'profiles' => [new ProfileImage(Attributes::imageAttributes())],
            'external_ids' => new ExternalIds(Attributes::personExternalIdsAttributes()),
        ]);
    }
}
