<?php

namespace Chiiya\Tmdb\Models\Person;

trait HasPersonAttributes
{
    private int $id;
    private string $knownForDepartment;
    private string $name;
    private int $gender;
    /** @var int|float */
    private $popularity;
    private ?string $profilePath;
    private bool $adult;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
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

    public function getGender(): int
    {
        return $this->gender;
    }

    public function setGender(int $gender): void
    {
        $this->gender = $gender;
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

    public function getPersonAttributes(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'popularity' => $this->getPopularity(),
            'profile_path' => $this->getProfilePath(),
            'adult' => $this->isAdult(),
            'gender' => $this->getGender(),
            'known_for_department' => $this->getKnownForDepartment(),
        ];
    }
}
