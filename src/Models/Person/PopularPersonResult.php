<?php

namespace Chiiya\Tmdb\Models\Person;

use Chiiya\Tmdb\Models\Entity;
use Chiiya\Tmdb\Models\Media;
use Chiiya\Tmdb\Models\Movie\Movie;
use Chiiya\Tmdb\Models\Tv\TvShow;

class PopularPersonResult extends Entity
{
    use HasPersonAttributes;

    /** @var Media[] */
    private $knownFor = [];

    /**
     * @return Movie[]|TvShow[]
     */
    public function getKnownFor(): array
    {
        return $this->knownFor;
    }

    /**
     * @param Media[] $knownFor
     */
    public function setKnownFor(array $knownFor): void
    {
        $this->knownFor = [];
        foreach ($knownFor as $media) {
            $this->addKnownForEntry($media);
        }
    }

    public function addKnownForEntry(Media $media): void
    {
        $this->knownFor[] = $media;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return array_merge($this->getPersonAttributes(), [
            'known_for' => $this->getKnownFor(),
        ]);
    }
}
