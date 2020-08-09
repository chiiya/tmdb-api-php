<?php

namespace Chiiya\Tmdb\Models\Image;

trait HasIsoInformation
{
    /** @var string|null */
    private $iso6391;

    public function getIso6391(): ?string
    {
        return $this->iso6391;
    }

    /**
     * @return static
     */
    public function setIso6391(?string $iso6391)
    {
        $this->iso6391 = $iso6391;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'iso_639_1' => $this->getIso6391(),
        ]);
    }
}
