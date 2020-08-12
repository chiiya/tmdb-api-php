<?php

namespace Chiiya\Tmdb\Models\Collection;

use Chiiya\Tmdb\Models\AbstractTranslation;

class Translation extends AbstractTranslation
{
    /** @var TranslationData */
    private $data;

    public function getData(): TranslationData
    {
        return $this->data;
    }

    public function setData(TranslationData $data): Translation
    {
        $this->data = $data;

        return $this;
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'data' => $this->getData(),
        ]);
    }
}
