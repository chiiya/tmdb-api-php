<?php

namespace Chiiya\Tmdb\Models\Image;

trait HasIsoInformation
{
    private ?string $iso6391;

    public function getIso6391(): ?string
    {
        return $this->iso6391;
    }

    public function setIso6391(?string $iso6391): void
    {
        $this->iso6391 = $iso6391;
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
