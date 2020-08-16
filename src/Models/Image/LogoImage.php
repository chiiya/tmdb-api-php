<?php

namespace Chiiya\Tmdb\Models\Image;

class LogoImage extends Image
{
    protected static string $format = Image::FORMAT_LOGO;
    private string $id;
    private string $fileType;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getFileType(): string
    {
        return $this->fileType;
    }

    public function setFileType(string $fileType): void
    {
        $this->fileType = $fileType;
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
