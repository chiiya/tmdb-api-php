<?php

namespace Chiiya\Tmdb\Query;

class Page implements QueryParameterInterface
{
    /** @var int|string */
    protected $page;

    /**
     * Page constructor.
     *
     * @param int|string $page
     */
    public function __construct($page)
    {
        $this->page = $page;
    }

    public function getKey(): string
    {
        return 'page';
    }

    public function getValue(): string
    {
        return (string) $this->page;
    }
}
