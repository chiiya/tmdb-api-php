<?php

namespace Chiiya\Tmdb\Resources;

class Companies extends AbstractResource
{
    /**
     * Get a companies details by id.
     *
     * @see https://developers.themoviedb.org/3/companies/get-company-details
     *
     * @param int|string $id
     */
    public function getCompany($id, array $parameters = []): array
    {
        return $this->get('company/'.$id, $parameters);
    }

    /**
     * Get the alternative names of a company.
     *
     * @see https://developers.themoviedb.org/3/companies/get-company-alternative-names
     *
     * @param int|string $id
     */
    public function getAlternativeNames($id, array $parameters = []): array
    {
        return $this->get('company/'.$id.'/alternative_names', $parameters);
    }

    /**
     * Get a companies logos by id.
     *
     * There are two image formats that are supported for companies, PNGs and SVGs. You can see
     * which type the original file is by looking at the file_type field. We prefer SVGs as they
     * are resolution independent and as such, the width and height are only there to reflect the
     * original asset that was uploaded. An SVG can be scaled properly beyond those dimensions if
     * you call them as a PNG.
     *
     * @see https://developers.themoviedb.org/3/companies/get-company-images
     * @see https://developers.themoviedb.org/3/getting-started/images
     *
     * @param int|string $id
     */
    public function getImages($id, array $parameters = []): array
    {
        return $this->get('company/'.$id.'/images', $parameters);
    }
}
