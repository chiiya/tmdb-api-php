<?php

namespace Chiiya\Tmdb\Models;

class Certification extends Entity
{
    /** @var string */
    private $certification;
    /** @var string */
    private $meaning;
    /** @var int */
    private $order;

    public static $properties = ['certification', 'meaning', 'order'];

    public function getCertification(): string
    {
        return $this->certification;
    }

    public function setCertification(string $certification): Certification
    {
        $this->certification = $certification;

        return $this;
    }

    public function getMeaning(): string
    {
        return $this->meaning;
    }

    public function setMeaning(string $meaning): Certification
    {
        $this->meaning = $meaning;

        return $this;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setOrder(int $order): Certification
    {
        $this->order = $order;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'certification' => $this->getCertification(),
            'meaning' => $this->getMeaning(),
            'order' => $this->getOrder(),
        ];
    }
}
