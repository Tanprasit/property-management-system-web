<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;

use App\Property;
use App\Device;
use Redirect;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $properties = Property::all();
        
        return View('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'address_line_1' => 'required',
            'address_line_2' => '',
            'city' =>'required',
            'county' => 'required',
            'postcode' => 'required'
        ]);

        $address_line_1 = $request->Input('address_line_1');
        $address_line_2 = $request->Input('address_line_2');
        $city = $request->Input('city');
        $county = $request->Input('county');
        $postcode = $request->input('postcode');

        $newProperty = new Property();

        $newProperty->address_line_1 = $address_line_1;
        $newProperty->address_line_2 = $address_line_2;
        $newProperty->city = $city;
        $newProperty->county = $county;
        $newProperty->postcode = $postcode;

        $newProperty->save();

        return Redirect::route('properties.show', [$newProperty->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $property = Property::find($id);

        $currentDevicesIds = [];
        $index = 0;

        foreach ($property->devices() as $device) {
            $currentDevicesIds[$index++] = $device->id;
        }

        $devices = Device::whereNotIn('id', $currentDevicesIds)->get();

        // $devices = Device::all();

        return View('properties.show', compact('property', 'devices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $property = Property::find($id);

        return View('properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'address_line_1' => 'required',
            'address_line_2' => '',
            'city' =>'required',
            'county' => 'required',
            'postcode' => 'required'
        ]);

        $property = Property::find($id);

        $address_line_1 = $request->Input('address_line_1');
        $address_line_2 = $request->Input('address_line_2');
        $city = $request->Input('city');
        $county = $request->Input('county');
        $postcode = $request->input('postcode');

        $property->address_line_1 = $address_line_1;
        $property->address_line_2 = $address_line_2;
        $property->city = $city;
        $property->county = $county;
        $property->postcode = $postcode;

        $property->save();

        return Redirect::route('properties.show', [$property->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $property = Property::find($id);

        $property->delete();

        return Redirect::route('properties.index');
    }

    // Mapping a single device to a property. Will update this later allow multiple additions.
    public function addDevice(Request $request, $id) {
        $property = Property::find($id);

        $device_id = $request->Input('device_id');

        $property->devices()->attach($device_id);

        $property->save();

        return Redirect::route('properties.show', [$property->id]);
    }

    // Remove disconnecting a device from a property. 
    public function removeDevice(Request $request, $id) {
        $property = Property::find($id);

        $device_id = $request->Input('device_id');

        $property->devices()->detach($device_id);

        $property->save();

        return Redirect::route('properties.show', [$property->id]);
    }
}
