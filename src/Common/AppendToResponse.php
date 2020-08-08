<?php

namespace Chiiya\Tmdb\Common;

class AppendToResponse implements QueryParameterInterface
{
    public const IMAGES = 'images';
    public const TRANSLATIONS = 'translations';

    /** @var array */
    protected $appends;

    /**
     * AppendToResponse constructor.
     */
    public function __construct(array $appends = [])
    {
        $this->appends = $appends;
    }

    public function getKey(): string
    {
        return 'append_to_response';
    }

    public function getValue(): string
    {
        return implode(',', $this->appends);
    }
}
