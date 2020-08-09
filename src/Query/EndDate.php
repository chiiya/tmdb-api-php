<?php

namespace Chiiya\Tmdb\Query;

class EndDate implements QueryParameterInterface
{
    use HandlesDates;

    /**
     * EndDate constructor.
     *
     * @param $date
     */
    public function __construct($date)
    {
        $this->date = $this->parseDate($date);
    }

    public function getKey(): string
    {
        return 'end_date';
    }
}
