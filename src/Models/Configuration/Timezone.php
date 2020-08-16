<?php

namespace Chiiya\Tmdb\Models\Configuration;

use Chiiya\Tmdb\Models\Entity;

class Timezone extends Entity
{
    private string $iso31661;
    /** @var string[] */
    private array $zones;

    public function getIso31661(): string
    {
        return $this->iso31661;
    }

    public function setIso31661(string $iso31661): void
    {
        $this->iso31661 = $iso31661;
    }

    /**
     * @return string[]
     */
    public function getZones(): array
    {
        return $this->zones;
    }

    /**
     * @param string[] $zones
     */
    public function setZones(array $zones): void
    {
        $this->zones = $zones;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'iso_3166_1' => $this->getIso31661(),
            'zones' => $this->getZones(),
        ];
    }
}
