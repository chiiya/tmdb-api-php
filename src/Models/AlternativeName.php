<?php

namespace Chiiya\Tmdb\Models;

class AlternativeName extends Entity
{
    /** @var string */
    private $name;
    /** @var string */
    private $type;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): AlternativeName
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): AlternativeName
    {
        $this->type = $type;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'type' => $this->getType(),
        ];
    }
}
