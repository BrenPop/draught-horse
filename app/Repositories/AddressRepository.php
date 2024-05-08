<?php

namespace App\Repositories;

use App\Models\Address;
use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use App\Repositories\Interfaces\IAddressRepository;

class AddressRepository extends BaseRepository implements IAddressRepository
{
    public function __construct(Address $address)
    {
        $this->model = $address;
    }

    /**
     * Get all countries
     */
    public function getAllCountries(bool $active = true)
    {
        return Country::where('active', $active)
            ->pluck('common_name', 'id')
            ->toArray();
    }

    /**
     * Get provinces by country
     */
    public function getProvincesByCountry(int $countryId, bool $active = true)
    {
        return Province::where('country_id', $countryId)
            ->where('active', $active)
            ->pluck('name', 'id')
            ->toArray();
    }

    /**
     * Get cities by province
     */
    public function getCitiesByProvince(int $provinceId, bool $active = true)
    {
        return City::where('province_id', $provinceId)
            ->where('active', $active)
            ->pluck('name', 'id')
            ->toArray();
    }
}
