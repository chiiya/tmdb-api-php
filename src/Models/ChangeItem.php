<?php

namespace Chiiya\Tmdb\Models;

class ChangeItem extends Entity
{
    private string $id;
    private string $action;
    private string $time;
    /** @var mixed */
    private $value;
    /** @var mixed */
    private $originalValue;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function setTime(string $time): void
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getOriginalValue()
    {
        return $this->originalValue;
    }

    /**
     * @param mixed $originalValue
     */
    public function setOriginalValue($originalValue): void
    {
        $this->originalValue = $originalValue;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'action' => $this->getAction(),
            'time' => $this->getTime(),
            'value' => $this->getValue(),
            'original_value' => $this->getOriginalValue(),
        ];
    }
}
