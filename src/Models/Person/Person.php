<?php

namespace Chiiya\Tmdb\Models\Person;

use Chiiya\Tmdb\Models\Entity;
use DateTime;

class Person extends Entity
{
    private int $id;
    private ?DateTime $birthday;
    private ?DateTime $deathday;
    private string $knownForDepartment;
    private string $name;
    private array $alsoKnownAs;
    private int $gender;
    private string $biography;
    /** @var int|float */
    private $popularity;
    private ?string $placeOfBirth;
    private ?string $profilePath;
    private bool $adult;
    private ?string $imdbId;
    private ?string $homepage;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

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

    public function getKnownForDepartment(): string
    {
        return $this->knownForDepartment;
    }

    public function setKnownForDepartment(string $knownForDepartment): void
    {
        $this->knownForDepartment = $knownForDepartment;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAlsoKnownAs(): array
    {
        return $this->alsoKnownAs;
    }

    public function setAlsoKnownAs(array $alsoKnownAs): void
    {
        $this->alsoKnownAs = $alsoKnownAs;
    }

    public function getGender(): int
    {
        return $this->gender;
    }

    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }

    public function getBiography(): string
    {
        return $this->biography;
    }

    public function setBiography(string $biography): void
    {
        $this->biography = $biography;
    }

    /**
     * @return float|int
     */
    public function getPopularity()
    {
        return $this->popularity;
    }

    /**
     * @param float|int $popularity
     */
    public function setPopularity($popularity): void
    {
        $this->popularity = $popularity;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->placeOfBirth;
    }

    public function setPlaceOfBirth(?string $placeOfBirth): void
    {
        $this->placeOfBirth = $placeOfBirth;
    }

    public function getProfilePath(): ?string
    {
        return $this->profilePath;
    }

    public function setProfilePath(?string $profilePath): void
    {
        $this->profilePath = $profilePath;
    }

    public function isAdult(): bool
    {
        return $this->adult;
    }

    public function setAdult(bool $adult): void
    {
        $this->adult = $adult;
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

    public function isMale(): bool
    {
        return $this->gender === 2;
    }

    public function isFemale(): bool
    {
        return $this->gender === 1;
    }

    public function isUnknownGender(): bool
    {
        return $this->gender === 0;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'birthday' => $this->getBirthday(),
            'deathday' => $this->getDeathday(),
            'known_for_department' => $this->getKnownForDepartment(),
            'name' => $this->getName(),
            'also_known_as' => $this->getAlsoKnownAs(),
            'gender' => $this->getGender(),
            'biography' => $this->getBiography(),
            'popularity' => $this->getPopularity(),
            'place_of_birth' => $this->getPlaceOfBirth(),
            'profile_path' => $this->getProfilePath(),
            'adult' => $this->isAdult(),
            'imdb_id' => $this->getImdbId(),
            'homepage' => $this->getHomepage(),
        ];
    }
}
