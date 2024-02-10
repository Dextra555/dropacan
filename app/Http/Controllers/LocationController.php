<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Area;

class LocationController extends Controller
{
    function location()
    {
        $countries = Country::all();
        $states = State::with('country_detail')->get();
        $cities = City::with('state_detail')->get();
        $areas = Area::with('city_detail')->get();
          return view('pages.location_state', compact('countries', 'states', 'cities', 'areas'));
    }

    function addState(Request $request)
    {
        $validatedData = $request->validate([
            'state' => 'required|string|max:15',
        ]);

        $stateName = $request->state;
        $state = new State();
        $state->name = $stateName;
        $state->country = 1;
        $state->save();

        
        return redirect()->back()->with('message', 'State Added Successfully!');
    }

    function addCity(Request $request)
    {
        $validatedData = $request->validate([
            'state' => 'required',
            'city' => 'required|string|max:15',
        ]);

        $stateId = $request->state;
        $cityName = $request->city;
        $city = new City();
        $city->name = $cityName;
        $city->state = $stateId;
        $city->save();

        return redirect()->back()->with('message', 'City Added Successfully!');
    }

    function addArea(Request $request)
    {
        $validatedData = $request->validate([
            'city' => 'required',
            'area' => 'required|string|max:15',
        ]);

        $cityId = $request->city;
        $areaName = $request->area;
        $area = new Area();
        $area->name = $areaName;
        $area->city = $cityId;
        $area->save();

        return redirect()->back()->with('message', 'Area Added Successfully!');
    }

    function deleteState($id)
    {
        State::where('id', $id)->delete();
        $cities = City::where('state', $id)->get();
        foreach ($cities as $city) {
            Area::where('city', $city->id)->delete();
        }
        City::where('state', $id)->delete();

        return redirect()->back()->with('message', 'State Deleted Successfully!');
    }

    function deleteCity($id)
    {
        City::where('id', $id)->delete();
        Area::where('city', $id)->delete();

        City::where('state', $id)->delete();
        return redirect()->back()->with('message', 'City Deleted Successfully!');
    }

    function deleteArea($id)
    {
        Area::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Area Deleted Successfully!');
    }
}