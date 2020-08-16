<?php

namespace Chiiya\Tmdb\Normalizers;

use Symfony\Component\String\Inflector\EnglishInflector as BaseInflector;
use Symfony\Component\String\Inflector\InflectorInterface;

class EnglishInflector implements InflectorInterface
{
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
        if (strtolower($plural) === 'cast' || strtolower($plural) === 'crew') {
            return [$plural.'Member'];
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
