<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Common\ResponseHelper;
use Chiiya\Tmdb\Models\AlternativeName;
use Chiiya\Tmdb\Models\Company;
use Chiiya\Tmdb\Models\Image\LogoImage;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class CompanyRepository extends AbstractRepository
{
    /**
     * Get a companies details by id.
     *
     * @see https://developers.themoviedb.org/3/companies/get-company-details
     *
     * @param int|string $id
     *
     * @throws ExceptionInterface
     */
    public function getCompany($id, array $parameters = []): Company
    {
        $response = ResponseHelper::flatten($this->getResource()->getCompany($id, $parameters));

        return $this->serializer->denormalize($response, Company::class);
    }

    /**
     * Get the alternative names of a company.
     *
     * @see https://developers.themoviedb.org/3/companies/get-company-alternative-names
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
        return $this->getClient()->companies();
    }
}
