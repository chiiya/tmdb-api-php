<?php

namespace Chiiya\Tmdb\Models\Person;

use Chiiya\Tmdb\Models\Entity;

class ExternalIds extends Entity
{
    private ?string $twitterId;
    private ?string $facebookId;
    private ?int $tvrageId;
    private ?string $instagramId;
    private ?string $freebaseMid;
    private ?string $freebaseId;
    private ?string $imdbId;

    public function getTwitterId(): ?string
    {
        return $this->twitterId;
    }

    public function setTwitterId(?string $twitterId): void
    {
        $this->twitterId = $twitterId;
    }

    public function getFacebookId(): ?string
    {
        return $this->facebookId;
    }

    public function setFacebookId(?string $facebookId): void
    {
        $this->facebookId = $facebookId;
    }

    public function getTvrageId(): ?int
    {
        return $this->tvrageId;
    }

    public function setTvrageId(?int $tvrageId): void
    {
        $this->tvrageId = $tvrageId;
    }

    public function getInstagramId(): ?string
    {
        return $this->instagramId;
    }

    public function setInstagramId(?string $instagramId): void
    {
        $this->instagramId = $instagramId;
    }

    public function getFreebaseMid(): ?string
    {
        return $this->freebaseMid;
    }

    public function setFreebaseMid(?string $freebaseMid): void
    {
        $this->freebaseMid = $freebaseMid;
    }

    public function getFreebaseId(): ?string
    {
        return $this->freebaseId;
    }

    public function setFreebaseId(?string $freebaseId): void
    {
        $this->freebaseId = $freebaseId;
    }

    public function getImdbId(): ?string
    {
        return $this->imdbId;
    }

    public function setImdbId(?string $imdbId): void
    {
        $this->imdbId = $imdbId;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'twitter_id' => $this->getTwitterId(),
            'facebook_id' => $this->getFacebookId(),
            'tvrage_id' => $this->getTvrageId(),
            'instagram_id' => $this->getInstagramId(),
            'freebase_mid' => $this->getFreebaseMid(),
            'freebase_id' => $this->getFreebaseId(),
            'imdb_id' => $this->getImdbId(),
        ];
    }
}
