<?php

namespace Chiiya\Tmdb\Models\Configuration;

use Chiiya\Tmdb\Models\Entity;

class Configuration extends Entity
{
    private ImageConfiguration $images;
    /** @var string[] */
    private array $changeKeys;

    public function getImages(): ImageConfiguration
    {
        return $this->images;
    }

    public function setImages(ImageConfiguration $images): void
    {
        $this->images = $images;
    }

    /**
     * @return string[]
     */
    public function getChangeKeys(): array
    {
        return $this->changeKeys;
    }

    /**
     * @param string[] $changeKeys
     */
    public function setChangeKeys(array $changeKeys): void
    {
        $this->changeKeys = $changeKeys;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'images' => $this->getImages(),
            'change_keys' => $this->getChangeKeys(),
        ];
    }
}
