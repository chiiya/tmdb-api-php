<?php

namespace Chiiya\Tmdb\Models\Person;

use Chiiya\Tmdb\Models\AbstractTranslation;

class Translation extends AbstractTranslation
{
    private TranslationData $data;

    public function getData(): TranslationData
    {
        return $this->data;
    }

    public function setData(TranslationData $data): void
    {
        $this->data = $data;
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'data' => $this->getData(),
        ]);
    }
}
