<?php

namespace App\Repositories\Interfaces;

interface IAddressRepository extends IBaseRepository
{
    public function getAllCountries(bool $active = true);

    public function getProvincesByCountry(int $countryId, bool $active = true);

    public function getCitiesByProvince(int $provinceId, bool $active = true);
}
