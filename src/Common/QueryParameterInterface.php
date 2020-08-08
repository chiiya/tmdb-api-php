<?php

namespace Chiiya\Tmdb\Common;

interface QueryParameterInterface
{
    public function getKey(): string;

    public function getValue(): string;
}
