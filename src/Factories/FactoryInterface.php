<?php

namespace Chiiya\Tmdb\Factories;

interface FactoryInterface
{
    public function create(array $data);
    public function createCollection(array $data);
}
