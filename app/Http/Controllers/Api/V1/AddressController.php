<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseController;
use App\Services\AddressService;

class AddressController extends BaseController
{
    /**
     * Construct the class.
     * 
     * @param AddressService $service
     */
    public function __construct(AddressService $service)
    {
        parent::__construct($service);
    }

    public function getCountries()
    {
        return $this->service->getAllCountries();
    }

    public function getProvincesByCountry(int $countryId)
    {
        return $this->service->getProvincesByCountryForDropDown($countryId);
    }

    public function getCitiesByProvince(int $provinceId)
    {
        return $this->service->getCitiesByProvinceForDropdown($provinceId);
    }
}
