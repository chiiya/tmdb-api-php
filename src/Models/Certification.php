<?php

namespace Chiiya\Tmdb\Models;

class Certification extends Entity
{
    private string $certification;
    private string $meaning;
    private int $order;

    public function getCertification(): string
    {
        return $this->certification;
    }

    public function setCertification(string $certification): void
    {
        $this->certification = $certification;
    }

    public function getMeaning(): string
    {
        return $this->meaning;
    }

    public function setMeaning(string $meaning): void
    {
        $this->meaning = $meaning;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setOrder(int $order): void
    {
        $this->order = $order;
    }
}
