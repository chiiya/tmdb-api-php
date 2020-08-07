<?php

namespace Chiiya\Tmdb\Models;

class Certification extends Entity
{
    /** @var string */
    private $certification;
    /** @var string */
    private $meaning;
    /** @var integer */
    private $order;

    public static $properties = ['certification', 'meaning', 'order'];

    /**
     * @return string
     */
    public function getCertification(): string
    {
        return $this->certification;
    }

    /**
     * @param string $certification
     * @return Certification
     */
    public function setCertification(string $certification): Certification
    {
        $this->certification = $certification;
        return $this;
    }

    /**
     * @return string
     */
    public function getMeaning(): string
    {
        return $this->meaning;
    }

    /**
     * @param string $meaning
     * @return Certification
     */
    public function setMeaning(string $meaning): Certification
    {
        $this->meaning = $meaning;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     * @return Certification
     */
    public function setOrder(int $order): Certification
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @inheritDoc
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
