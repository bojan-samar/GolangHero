<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Reservation;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::orderBy('id','desc')->paginate(50);
        $vehicles->append('full_image_urls');

        return Inertia::render('Admin/Vehicle/Index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();

        return Inertia::render('Admin/Vehicle/Create' , compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:1', 'max:191'],
            'slug' => ['required', 'string', 'min:1', 'max:191'],
            'title' => ['required', 'string', 'min:1', 'max:191'],
            'meta' => ['required', 'string', 'min:1', 'max:191'],
            'description' => ['nullable', 'string', 'min:1', 'max:5000'],
            'owner_website' => ['nullable', 'string', 'min:1', 'max:1000'],
            'price' => ['required', 'numeric'],
            'price_weekend' => ['nullable', 'numeric'],
            'capacity' => ['required', 'numeric'],
            'type' => ['required', 'string', 'min:1', 'max:191'],
            'company_uuid' => ['required', 'uuid'],
            'status' => ['required', 'boolean'],
        ]);

        $vehicle = new Vehicle;
        $vehicle->company_uuid = $request->company_uuid;
        $vehicle->slug = $request->slug;
        $vehicle->name = $request->name;
        $vehicle->title = $request->title;
        $vehicle->meta = $request->meta;
        $vehicle->description = $request->description;
        $vehicle->price = $request->price;
        $vehicle->price_weekend = $request->price_weekend;
        $vehicle->owner_website = $request->owner_website;
        $vehicle->capacity = $request->capacity;
        $vehicle->type = $request->type;
        $vehicle->status = $request->status;
        $vehicle->images = explode(',', $request->images);
        $vehicle->save();

        return redirect()->route('admin.vehicle.index')->with('flash.success', 'Vehicle Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $vehicle = Vehicle::where('slug', $slug)->firstOrFail();
        $vehicle->images = implode(',', $vehicle->images);

        return Inertia::render('Admin/Vehicle/Edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:1', 'max:191'],
            'slug' => ['required', 'string', 'min:1', 'max:191'],
            'title' => ['required', 'string', 'min:1', 'max:191'],
            'meta' => ['required', 'string', 'min:1', 'max:191'],
            'description' => ['nullable', 'string', 'min:1', 'max:5000'],
            'owner_website' => ['nullable', 'string', 'min:1', 'max:1000'],
            'price' => ['required', 'numeric'],
            'price_weekend' => ['nullable', 'numeric'],
            'capacity' => ['required', 'numeric'],
            'type' => ['required', 'string', 'min:1', 'max:191'],
            'status' => ['required', 'boolean'],
        ]);

        $vehicle->slug = $request->slug;
        $vehicle->name = $request->name;
        $vehicle->title = $request->title;
        $vehicle->meta = $request->meta;
        $vehicle->description = $request->description;
        $vehicle->price = $request->price;
        $vehicle->price_weekend = $request->price_weekend;
        $vehicle->capacity = $request->capacity;
        $vehicle->owner_website = $request->owner_website;
        $vehicle->type = $request->type;
        $vehicle->status = $request->status;
        $vehicle->images = explode(',', $request->images);
        $vehicle->save();


        return back()->with('flash.success', 'Vehicle Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('admin.vehicle.index')->with('flash.danger', 'Vehicle Deleted');
    }
}
