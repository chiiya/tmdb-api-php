<?php

namespace Chiiya\Tmdb\Resources;

class Networks extends AbstractResource
{
    /**
     * Get the details of a network.
     *
     * @see https://developers.themoviedb.org/3/networks/get-network-details
     *
     * @param string|int $id
     */
    public function getNetwork($id, array $parameters = []): array
    {
        return $this->get('network/'.$id, $parameters);
    }

    /**
     * Get the alternative names of a network.
     *
     * @see https://developers.themoviedb.org/3/networks/get-network-alternative-names
     *
     * @param int|string $id
     */
    public function getAlternativeNames($id, array $parameters = []): array
    {
        return $this->get('network/'.$id.'/alternative_names', $parameters);
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
     */
    public function getImages($id, array $parameters = []): array
    {
        return $this->get('network/'.$id.'/images', $parameters);
    }
}
