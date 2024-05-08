<?php

namespace App\Services\Interfaces;

interface IAddressService extends IBaseService
{
    public function getAllCountriesForDropdown();

    public function getProvincesByCountryForDropDown(int $countryId);

    public function getCitiesByProvinceForDropdown(int $provinceId);
}
