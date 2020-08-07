<?php

namespace Chiiya\Tmdb\Factories;

use Chiiya\Tmdb\Common\Collection;
use Chiiya\Tmdb\Models\Certification;
use Chiiya\Tmdb\Models\CertificationList;

class CertificationFactory extends AbstractFactory
{
    /**
     * {@inheritdoc}
     */
    public function create(array $data = [])
    {
        return $this->hydrate(new Certification(), $data);
    }

    /**
     * {@inheritdoc}
     */
    public function createCollection(array $data = [])
    {
        $data = $data['certifications'] ?? [];

        $items = [];

        foreach ($data as $country => $certifications) {
            $item = new CertificationList();
            $item->setCountry($country);
            $list = [];

            foreach ($certifications as $certification) {
                $list[] = $this->create($certification);
            }

            $item->getCertifications()->setInput($list);
            $items[] = $item;
        }

        return new Collection($items);
    }
}
