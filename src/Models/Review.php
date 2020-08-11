<?php

namespace Chiiya\Tmdb\Models;

class Review extends Entity
{
    /** @var string */
    private $id;
    /** @var string */
    private $author;
    /** @var string */
    private $content;
    /** @var string */
    private $iso6391;
    /** @var int */
    private $mediaId;
    /** @var string */
    private $mediaTitle;
    /** @var string */
    private $mediaType;
    /** @var string */
    private $url;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Review
    {
        $this->id = $id;

        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): Review
    {
        $this->author = $author;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): Review
    {
        $this->content = $content;

        return $this;
    }

    public function getIso6391(): string
    {
        return $this->iso6391;
    }

    public function setIso6391(string $iso6391): Review
    {
        $this->iso6391 = $iso6391;

        return $this;
    }

    public function getMediaId(): int
    {
        return $this->mediaId;
    }

    public function setMediaId(int $mediaId): Review
    {
        $this->mediaId = $mediaId;

        return $this;
    }

    public function getMediaTitle(): string
    {
        return $this->mediaTitle;
    }

    public function setMediaTitle(string $mediaTitle): Review
    {
        $this->mediaTitle = $mediaTitle;

        return $this;
    }

    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    public function setMediaType(string $mediaType): Review
    {
        $this->mediaType = $mediaType;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): Review
    {
        $this->url = $url;

        return $this;
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
