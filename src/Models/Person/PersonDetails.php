<?php

namespace Chiiya\Tmdb\Models\Person;

use Chiiya\Tmdb\Models\Change;
use Chiiya\Tmdb\Models\Image\ProfileImage;
use Chiiya\Tmdb\Responses\CombinedCreditsResponse;
use Chiiya\Tmdb\Responses\MovieCreditsResponse;
use Chiiya\Tmdb\Responses\TaggedImagesResponse;
use Chiiya\Tmdb\Responses\TvCreditsResponse;

class PersonDetails extends Person
{
    private ?MovieCreditsResponse $movieCredits;
    private ?TvCreditsResponse $tvCredits;
    private ?CombinedCreditsResponse $combinedCredits;
    private ?ExternalIds $externalIds;
    private ?TaggedImagesResponse $taggedImages;
    /** @var Change[]|null */
    private $changes;
    /** @var Translation[]|null */
    private $translations;
    /** @var ProfileImage[]|null */
    private $profiles;

    public function getMovieCredits(): ?MovieCreditsResponse
    {
        return $this->movieCredits;
    }

    public function setMovieCredits(?MovieCreditsResponse $movieCredits): void
    {
        $this->movieCredits = $movieCredits;
    }

    public function getTvCredits(): ?TvCreditsResponse
    {
        return $this->tvCredits;
    }

    public function setTvCredits(?TvCreditsResponse $tvCredits): void
    {
        $this->tvCredits = $tvCredits;
    }

    public function getCombinedCredits(): ?CombinedCreditsResponse
    {
        return $this->combinedCredits;
    }

    public function setCombinedCredits(?CombinedCreditsResponse $combinedCredits): void
    {
        $this->combinedCredits = $combinedCredits;
    }

    public function getExternalIds(): ?ExternalIds
    {
        return $this->externalIds;
    }

    public function setExternalIds(?ExternalIds $externalIds): void
    {
        $this->externalIds = $externalIds;
    }

    public function getTaggedImages(): ?TaggedImagesResponse
    {
        return $this->taggedImages;
    }

    public function setTaggedImages(?TaggedImagesResponse $taggedImages): void
    {
        $this->taggedImages = $taggedImages;
    }

    /**
     * @return Change[]|null
     */
    public function getChanges(): ?array
    {
        return $this->changes;
    }

    /**
     * @param Change[]|null $changes
     */
    public function setChanges(?array $changes): void
    {
        $this->changes = [];
        foreach ($changes as $change) {
            $this->addChange($change);
        }
    }

    public function addChange(Change $change): void
    {
        $this->changes[] = $change;
    }

    /**
     * @return Translation[]|null
     */
    public function getTranslations(): ?array
    {
        return $this->translations;
    }

    /**
     * @param Translation[]|null $translations
     */
    public function setTranslations(?array $translations): void
    {
        $this->translations = [];
        foreach ($translations as $translation) {
            $this->addTranslation($translation);
        }
    }

    public function addTranslation(Translation $translation): void
    {
        $this->translations[] = $translation;
    }

    /**
     * @return ProfileImage[]|null
     */
    public function getProfiles(): ?array
    {
        return $this->profiles;
    }

    /**
     * @param ProfileImage[]|null $images
     */
    public function setProfiles(?array $images): void
    {
        $this->profiles = [];
        foreach ($images as $image) {
            $this->addProfile($image);
        }
    }

    public function addProfile(ProfileImage $image): void
    {
        $this->profiles[] = $image;
    }

    /**
     * @return ProfileImage[]|null
     */
    public function getImages(): ?array
    {
        return $this->profiles;
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'movie_credits' => $this->getMovieCredits(),
            'tv_credits' => $this->getTvCredits(),
            'combined_credits' => $this->getCombinedCredits(),
            'external_ids' => $this->getExternalIds(),
            'tagged_images' => $this->getTaggedImages(),
            'changes' => $this->getChanges(),
            'translations' => $this->getTranslations(),
            'profiles' => $this->getProfiles(),
        ]);
    }
}
