<?php

namespace Chiiya\Tmdb\Query;

class StartDate implements QueryParameterInterface
{
    use HandlesDates;

    /**
     * StartDate constructor.
     *
     * @param $date
     */
    public function __construct($date)
    {
        $this->date = $this->parseDate($date);
    }

    public function getKey(): string
    {
        return 'start_date';
    }
}
