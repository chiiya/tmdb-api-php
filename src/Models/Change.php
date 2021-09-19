<?php

namespace Chiiya\Tmdb\Models;

class Change extends Entity
{
    protected string $key;
    /** @var ChangeItem[] */
    protected array $items = [];

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return ChangeItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param ChangeItem[] $items
     */
    public function setItems(array $items): void
    {
        $this->items = [];
        foreach ($items as $item) {
            $this->addItem($item);
        }
    }

    public function addItem(ChangeItem $item): void
    {
        $this->items[] = $item;
    }
}
