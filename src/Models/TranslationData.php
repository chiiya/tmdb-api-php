<?php

namespace Chiiya\Tmdb\Models;

class TranslationData extends Entity
{
    /** @var string */
    private $title;
    /** @var string */
    private $overview;
    /** @var string */
    private $homepage;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): TranslationData
    {
        $this->title = $title;

        return $this;
    }

    public function getOverview(): string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): TranslationData
    {
        $this->overview = $overview;

        return $this;
    }

    public function getHomepage(): string
    {
        return $this->homepage;
    }

    public function setHomepage(string $homepage): TranslationData
    {
        $this->homepage = $homepage;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'title' => $this->getTitle(),
            'overview' => $this->getOverview(),
            'homepage' => $this->getHomepage(),
        ];
    }
}
