<?php

namespace Chiiya\Tmdb\Models;

class Keyword extends Entity
{
    /** @var int */
    private $id;
    /** @var string */
    private $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Keyword
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Keyword
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
