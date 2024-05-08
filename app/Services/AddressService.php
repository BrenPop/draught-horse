<?php

namespace App\Services;

use App\Repositories\AddressRepository;
use App\Services\Interfaces\IAddressService;

class AddressService extends BaseService implements IAddressService
{
    public function __construct(AddressRepository $addressRepository)
    {
        $this->repository = $addressRepository;
    }

    /**
     * Get all countries
     */
    public function getAllCountriesForDropdown()
    {
        $countries = $this->repository->getAllCountries();
        $countries = [
            0 => "Select Country",
        ] + $countries;

        return $countries;
    }

    /**
     * Get provinces by country
     */
    public function getProvincesByCountryForDropDown(int $countryId)
    {
        $provinces = $this->repository->getProvincesByCountry($countryId);
        $provinces = [
            0 => "Select Province",
        ] + $provinces;

        return $provinces;
    }

    /**
     * Get cities by province
     */
    public function getCitiesByProvinceForDropdown(int $provinceId)
    {
        $cities = $this->repository->getCitiesByProvince($provinceId);
        $cities = [
            0 => "Select City",
        ] + $cities;

        return $cities;
    }
}
