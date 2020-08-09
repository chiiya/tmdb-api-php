<?php

namespace Chiiya\Tmdb\Query;

class Language implements QueryParameterInterface
{
    /** @var string */
    protected $language;

    /**
     * Language constructor.
     */
    public function __construct(string $language = 'en-US')
    {
        $this->language = $language;
    }

    public function getKey(): string
    {
        return 'language';
    }

    public function getValue(): string
    {
        return $this->language;
    }
}
