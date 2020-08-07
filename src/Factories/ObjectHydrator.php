<?php

namespace Chiiya\Tmdb\Factories;

use Chiiya\Tmdb\Models\Entity;
use RuntimeException;

class ObjectHydrator
{
    /**
     * Hydrate an object with data.
     *
     * @throws RuntimeException
     */
    public function hydrate(Entity $object, array $data = []): Entity
    {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if (\in_array($key, $object::$properties, true)) {
                    $method = $this->toCamelCase(sprintf('set_%s', $key));
                    if (!\is_callable([$object, $method])) {
                        //@codeCoverageIgnoreStart
                        throw new RuntimeException(sprintf('Trying to call method "%s" on "%s", but it does not exist or is private.', $method, \get_class($object)));
                        //@codeCoverageIgnoreEnd
                    }
                    $object->$method($value);
                }
            }
        }

        return $object;
    }

    /**
     * Transforms an under_scored_string to a camelCasedOne.
     *
     * @param string $string
     */
    private function toCamelCase($string): string
    {
        return lcfirst(str_replace('_', '', ucwords($string, '_')));
    }
}
