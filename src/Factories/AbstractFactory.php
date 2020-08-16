<?php

namespace Chiiya\Tmdb\Factories;

use Chiiya\Tmdb\Models\Entity;
use RuntimeException;

abstract class AbstractFactory
{
    /**
     * Convert an array to a hydrated object.
     *
     * @return Entity|null
     */
    abstract public function create(array $data = []);

    /**
     * Convert an array with a collection of items to a hydrated object collection.
     */
    abstract public function createCollection(array $data = []): array;

    /**
     * Hydrate the object with data.
     *
     * @throws RuntimeException
     *
     * @return Entity
     */
    protected function hydrate(Entity $subject, array $data = [])
    {
        $hydrator = new ObjectHydrator();

        return $hydrator->hydrate($subject, $data);
    }
}
