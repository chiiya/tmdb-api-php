<?php

namespace Chiiya\Tmdb\Models\Person;

use Chiiya\Tmdb\Models\HasMediaAttributes;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

/**
 * @DiscriminatorMap(typeProperty="media_type", mapping={
 *    "movie"="Chiiya\Tmdb\Models\Person\MovieCastMember",
 *    "tv"="Chiiya\Tmdb\Models\Person\TvCastMember"
 * })
 */
abstract class CastMember extends Credit
{
    use HasMediaAttributes;

    private string $character;

    public function getCharacter(): string
    {
        return $this->character;
    }

    public function setCharacter(string $character): void
    {
        $this->character = $character;
    }

    public function toArray(): array
    {
        return array_merge($this->getMediaAttributes(), [
            'credit_id' => $this->getCreditId(),
            'character' => $this->getCharacter(),
        ]);
    }
}
