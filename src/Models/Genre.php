<?php

namespace Chiiya\Tmdb\Models;

class Genre extends Entity
{
    /** @var int */
    private $id;
    /** @var string */
    private $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Genre
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Genre
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
        ];
    }
}
