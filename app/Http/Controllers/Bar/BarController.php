<?php

namespace App\Http\Controllers\Bar;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Bar\CreateBarRequest;
use App\Http\Requests\Bar\UpdateBarRequest;
use App\Models\BarType;
use App\Services\AddressService;
use App\Services\BarService;
use App\Services\BarTypeService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Ramsey\Uuid\Guid\Guid;

class BarController extends BaseController
{
    /**
     * Construct the class.
     * 
     * @param BarService $service
     */
    public function __construct(
        BarService $service,
        protected BarTypeService $barTypeService,
        protected AddressService $addressService
    ) {
        parent::__construct($service);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bars = $this->service->getUserBars();

        if (count($bars) == 0) {
            return redirect()->route('bar.create')->with('info', 'Time to create your first bar!');
        }

        return view('bar.index', compact('bars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barTypes = $this->barTypeService->getBarTypes();
        $countries = $this->addressService->getAllCountriesForDropdown();
        $provinces = [0 => 'Select Province'];
        $cities = [0 => 'Select City'];

        return view('bar.create', compact('barTypes', 'countries', 'provinces', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBarRequest $request)
    {
        try {
            $image = $request->file('profile_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->file('profile_picture')->move(public_path('profile_pictures'), $imageName);
            $imagePath = '/profile_pictures/' . $imageName;

            $data = [
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'profile_picture_path' => $imagePath,
                'user_id' => request()->user()->id,
                'bar_type_id' => $request->get('bar_type_id'),
            ];

            $this->service->create($data);

            return redirect()->route('bar.index')->with('success', 'Bar created successfully!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bar = $this->service->findById((int)$id);
        dd($bar->address->getTable());

        return view('bar.profile.profile-detail', compact('bar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $bar = $this->service->findById((int)$id);

        return view('bar.profile.profile-detail', compact('bar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
