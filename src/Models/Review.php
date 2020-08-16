<?php

namespace Chiiya\Tmdb\Models;

class Review extends Entity
{
    private string $id;
    private string $author;
    private string $content;
    private string $iso6391;
    private int $mediaId;
    private string $mediaTitle;
    private string $mediaType;
    private string $url;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getIso6391(): string
    {
        return $this->iso6391;
    }

    public function setIso6391(string $iso6391): void
    {
        $this->iso6391 = $iso6391;
    }

    public function getMediaId(): int
    {
        return $this->mediaId;
    }

    public function setMediaId(int $mediaId): void
    {
        $this->mediaId = $mediaId;
    }

    public function getMediaTitle(): string
    {
        return $this->mediaTitle;
    }

    public function setMediaTitle(string $mediaTitle): void
    {
        $this->mediaTitle = $mediaTitle;
    }

    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    public function setMediaType(string $mediaType): void
    {
        $this->mediaType = $mediaType;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'author' => $this->getAuthor(),
            'content' => $this->getContent(),
            'iso_639_1' => $this->getIso6391(),
            'media_id' => $this->getMediaId(),
            'media_title' => $this->getMediaTitle(),
            'media_type' => $this->getMediaType(),
            'url' => $this->getUrl(),
        ];
    }
}
