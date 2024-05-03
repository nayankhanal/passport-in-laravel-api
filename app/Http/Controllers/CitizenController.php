<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\City;
use App\Http\Requests\CitizenRequest;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citizens = Citizen::all();
        return view('citizens.index', compact('citizens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        // $cities = City::all();

        return view('citizens.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CitizenRequest $request)
    {
        try {
            Citizen::create($request->validated());
            return redirect()->route('citizens.index')->with('success','Data successfully created!');
        } catch (\Exception $e) {
            return redirect()->route('citizens.create')->with('error','Something went wrong during data creation!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Citizen $citizen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Citizen $citizen)
    {
        $countries = Country::all();
        $cities = City::all();
        return view('citizens.edit', compact('citizen', 'countries', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CitizenRequest $request, Citizen $citizen)
    {
        try {
            $citizen->update($request->validated());
            return redirect()->route('citizens.index')->with('success','Data updated created!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Something went wrong during data update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Citizen $citizen)
    {
        try {
            $citizen->delete();
            return redirect()->route('citizens.index')->with('success','Data deleted successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('citizens.index')->with('error','Something went wrong during data deletion!');
        }
    }

    public function get_cities($country) {
        $country_cities = City::where('country_id', $country)->get();
        return $country_cities;
        // return response()->json(['country_cities'=>$country_cities]);
    }
}
