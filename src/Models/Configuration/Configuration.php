<?php

namespace Chiiya\Tmdb\Models\Configuration;

use Chiiya\Tmdb\Models\Entity;

class Configuration extends Entity
{
    /** @var ImageConfiguration */
    private $images;
    /** @var string[] */
    private $changeKeys;

    public function getImages(): ImageConfiguration
    {
        return $this->images;
    }

    public function setImages(ImageConfiguration $images): Configuration
    {
        $this->images = $images;

        return $this;
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
    public function setChangeKeys(array $changeKeys): Configuration
    {
        $this->changeKeys = $changeKeys;

        return $this;
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
