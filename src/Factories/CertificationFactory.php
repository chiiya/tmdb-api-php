<?php

namespace Chiiya\Tmdb\Factories;

use Chiiya\Tmdb\Models\CertificationList;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Serializer;

class CertificationFactory
{
    private Serializer $serializer;

    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * Convert an array with a collection of items to a hydrated object collection.
     *
     * @throws ExceptionInterface
     */
    public function createCollection(array $data = []): array
    {
        $data = $data['certifications'] ?? [];

        $items = [];

        foreach ($data as $country => $certifications) {
            $item = new CertificationList();
            $item->setCountry($country);
            $item->setCertifications($this->serializer->denormalize($certifications, 'Chiiya\Tmdb\Models\Certification[]'));
            $items[] = $item;
        }

        return $items;
    }
}
