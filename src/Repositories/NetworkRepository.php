<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Common\ResponseHelper;
use Chiiya\Tmdb\Models\AlternativeName;
use Chiiya\Tmdb\Models\Image\LogoImage;
use Chiiya\Tmdb\Models\Network;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class NetworkRepository extends AbstractRepository
{
    /**
     * Get the details of a network.
     *
     * @see https://developers.themoviedb.org/3/networks/get-network-details
     *
     * @param int|string $id
     *
     * @throws ExceptionInterface
     */
    public function getNetwork($id, array $parameters = []): Network
    {
        $response = ResponseHelper::flatten($this->getResource()->getNetwork($id, $parameters));

        return $this->serializer->denormalize($response, Network::class);
    }

    /**
     * Get the alternative names of a network.
     *
     * @see https://developers.themoviedb.org/3/networks/get-network-alternative-names
     *
     * @param int|string $id
     *
     * @throws ExceptionInterface
     *
     * @return AlternativeName[]
     */
    public function getAlternativeNames($id, array $parameters = []): array
    {
        $response = $this->getResource()->getAlternativeNames($id, $parameters)['results'] ?? [];

        return $this->serializer->denormalize($response, 'Chiiya\Tmdb\Models\AlternativeName[]');
    }

    /**
     * Get the TV network logos by id.
     *
     * There are two image formats that are supported for networks, PNGs and SVGs. You can see
     * which type the original file is by looking at the file_type field. We prefer SVGs as they
     * are resolution independent and as such, the width and height are only there to reflect the
     * original asset that was uploaded. An SVG can be scaled properly beyond those dimensions if
     * you call them as a PNG.
     *
     * @see https://developers.themoviedb.org/3/networks/get-network-images
     * @see https://developers.themoviedb.org/3/getting-started/images
     *
     * @param int|string $id
     *
     * @throws ExceptionInterface
     *
     * @return LogoImage[]
     */
    public function getImages($id, array $parameters = []): array
    {
        $response = $this->getResource()->getImages($id, $parameters)['logos'] ?? [];

        return $this->serializer->denormalize($response, 'Chiiya\Tmdb\Models\Image\LogoImage[]');
    }

    /**
     * {@inheritdoc}
     */
    protected function getResource()
    {
        return $this->getClient()->networks();
    }
}
