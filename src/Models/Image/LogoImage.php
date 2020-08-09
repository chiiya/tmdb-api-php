<?php

namespace Chiiya\Tmdb\Models\Image;

class LogoImage extends Image
{
    /** @var string */
    private $id;
    /** @var string */
    private $fileType;

    public function getType(): string
    {
        return Image::FORMAT_LOGO;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): LogoImage
    {
        $this->id = $id;

        return $this;
    }

    public function getFileType(): string
    {
        return $this->fileType;
    }

    public function setFileType(string $fileType): LogoImage
    {
        $this->fileType = $fileType;

        return $this;
    }

    public function isSVG(): bool
    {
        return $this->getFileType() === '.svg';
    }

    public function isPNG(): bool
    {
        return $this->getFileType() === '.png';
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'id' => $this->getId(),
            'file_type' => $this->getFileType(),
        ]);
    }
}
