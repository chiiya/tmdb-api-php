<?php

namespace Chiiya\Tmdb\Models\Person;

use Chiiya\Tmdb\Models\Entity;
use DateTime;

class Person extends Entity
{
    use HasPersonAttributes;

    private ?DateTime $birthday;
    private ?DateTime $deathday;
    private array $alsoKnownAs;
    private string $biography;
    private ?string $placeOfBirth;
    private ?string $imdbId;
    private ?string $homepage;

    public function getBirthday(): ?DateTime
    {
        return $this->birthday;
    }

    public function setBirthday(?DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getDeathday(): ?DateTime
    {
        return $this->deathday;
    }

    public function setDeathday(?DateTime $deathday): void
    {
        $this->deathday = $deathday;
    }

    public function getAlsoKnownAs(): array
    {
        return $this->alsoKnownAs;
    }

    public function setAlsoKnownAs(array $alsoKnownAs): void
    {
        $this->alsoKnownAs = $alsoKnownAs;
    }

    public function getBiography(): string
    {
        return $this->biography;
    }

    public function setBiography(string $biography): void
    {
        $this->biography = $biography;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->placeOfBirth;
    }

    public function setPlaceOfBirth(?string $placeOfBirth): void
    {
        $this->placeOfBirth = $placeOfBirth;
    }

    public function getImdbId(): ?string
    {
        return $this->imdbId;
    }

    public function setImdbId(?string $imdbId): void
    {
        $this->imdbId = $imdbId;
    }

    public function getHomepage(): ?string
    {
        return $this->homepage;
    }

    public function setHomepage(?string $homepage): void
    {
        $this->homepage = $homepage;
    }

    public function toArray(): array
    {
        return array_merge($this->getPersonAttributes(), [
            'birthday' => $this->getBirthday(),
            'deathday' => $this->getDeathday(),
            'also_known_as' => $this->getAlsoKnownAs(),
            'biography' => $this->getBiography(),
            'place_of_birth' => $this->getPlaceOfBirth(),
            'imdb_id' => $this->getImdbId(),
            'homepage' => $this->getHomepage(),
        ]);
    }
}
