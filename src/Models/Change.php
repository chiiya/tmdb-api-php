<?php

namespace Chiiya\Tmdb\Models;

class Change extends Entity
{
    /** @var int */
    protected $id;
    /** @var bool|null */
    protected $adult;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Change
    {
        $this->id = $id;

        return $this;
    }

    public function getAdult(): ?bool
    {
        return $this->adult;
    }

    public function setAdult(?bool $adult): Change
    {
        $this->adult = $adult;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'adult' => $this->getAdult(),
        ];
    }
}
