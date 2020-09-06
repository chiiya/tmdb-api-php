<?php

namespace Chiiya\Tmdb\Normalizers;

use Symfony\Component\String\Inflector\EnglishInflector as BaseInflector;
use Symfony\Component\String\Inflector\InflectorInterface;

class EnglishInflector implements InflectorInterface
{
    protected $singulars = [
        'cast' => 'castMember',
        'crew' => 'crewMember',
        'knownFor' => 'knownForEntry',
    ];

    protected BaseInflector $inflector;

    public function __construct()
    {
        $this->inflector = new BaseInflector();
    }

    /**
     * {@inheritdoc}
     */
    public function singularize(string $plural): array
    {
        if (in_array(lcfirst($plural), array_keys($this->singulars))) {
            return [$this->singulars[lcfirst($plural)]];
        }

        return $this->inflector->singularize($plural);
    }

    /**
     * {@inheritdoc}
     */
    public function pluralize(string $singular): array
    {
        return $this->inflector->pluralize($singular);
    }
}
