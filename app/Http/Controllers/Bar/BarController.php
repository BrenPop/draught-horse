<?php

namespace App\Http\Controllers\Bar;

use App\Http\Controllers\BaseController;
use App\Http\Requests\CreateBarRequest;
use App\Models\BarType;
use App\Services\BarService;
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
    public function __construct(BarService $service)
    {
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

        return view('bar.dashboard', compact('bars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Cache::has('bar_types')) {
            $barTypes = Cache::get('bar_types');
        } else {
            $barTypes = BarType::all()->pluck('name', 'id');
            Cache::put('bar_types', $barTypes, 1440);
        }

        return view('bar.create.create', compact('barTypes'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $bar = $this->service->findById((int)$id);
        dd($this->service);

        return view('bar.profile.profile-detail', compact('bar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
