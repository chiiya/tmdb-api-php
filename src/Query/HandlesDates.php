<?php

namespace Chiiya\Tmdb\Query;

use DateTimeInterface;

trait HandlesDates
{
    /** @var string */
    protected $date;

    public function getValue(): string
    {
        return $this->date;
    }

    /**
     * @param $date
     */
    protected function parseDate($date): string
    {
        if ($date instanceof DateTimeInterface) {
            return $date->format('Y-m-d');
        }

        return (string) $date;
    }
}
