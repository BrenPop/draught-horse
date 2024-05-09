<?php

namespace App\Services;

use App\Models\BarRegistrationStatus;
use App\Repositories\AddressRepository;
use App\Repositories\BarRepository;
use App\Services\Interfaces\IBarService;
use Illuminate\Http\Request;

class BarService extends BaseService implements IBarService
{
    public function __construct(
        BarRepository $repository,
        protected AddressRepository $addressRepository
    ) {
        parent::__construct($repository);
    }

    public function createBar(Request $request)
    {
        $image = $request->file('profile_picture');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->file('profile_picture')->move(public_path('profile_pictures'), $imageName);
        $imagePath = '/profile_pictures/' . $imageName;

        $barData = [
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'profile_picture_path' => $imagePath,
            'profile_completion_percentage' => 0,
            'user_id' => request()->user()->id,
            'bar_type_id' => $request->get('bar_type_id'),
            'bar_registration_status_id' => BarRegistrationStatus::where('slug', 'pending')->first()->id
        ];

        $bar = $this->repository->create($barData);

        $addressData = [
            'address_line_one' => $request->get('address_line_one'),
            'address_line_two' => $request->get('address_line_two'),
            'country_id' => $request->get('country_id'),
            'province_id' => $request->get('province_id'),
            'city_id' => $request->get('city_id'),
            'postal_code' => $request->get('postal_code'),
            'bar_id' => $bar->id
        ];

        $address = $this->addressRepository->create($addressData);

        return $bar;
    }

    public function getUserBars()
    {
        $user = request()->user();

        return $this->repository->getAllBarsByUserId($user->id);
    }

    public function updateBarProfileCompletionPercentage(int $barId)
    {
    }

    public function getBarProfileCompletionPercentage(int $barId)
    {
        return 0;
    }
}
