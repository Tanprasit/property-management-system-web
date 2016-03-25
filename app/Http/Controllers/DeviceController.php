<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;

use App\Device;
use App\Notification;
use Redirect;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $devices =  Device::all();

        return View('devices.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('devices.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'model' => 'required',
            'manufacturer' => 'required',
            'product' => 'required',
            'sdk_version' => 'required',
            'serial_number' => 'required|unique:devices',
            'latitude' => '',
            'longitude' => ''
        ]);

        $model = $request->Input('model');
        $manufacturer = $request->Input('manufacturer');
        $product = $request->Input('product');
        $sdk_version = $request->Input('sdk_version');
        $serial_number = $request->Input('serial_number');
        $latitude = $request->Input('latitude');
        $longitude = $request->Input('longitude');

        $newDevice = new Device();

        $newDevice->model = $model;
        $newDevice->manufacturer = $manufacturer;
        $newDevice->product = $product;
        $newDevice->sdk_version = $sdk_version;
        $newDevice->serial_number = $serial_number;
        $newDevice->latitude = $latitude;
        $newDevice->longitude = $longitude;

        $newDevice->save();

        return Redirect::route('devices.show', [$newDevice->id]);
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
        $device = Device::find($id);

        $notifications = Notification::all();

        return View('devices.show', compact('device', 'notifications'));
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
        $device = Device::find($id);

        return View('devices.edit', compact('device'));
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
            'model' => 'required',
            'manufacturer' => 'required',
            'product' => 'required',
            'sdk_version' => 'required',
            'serial_number' => 'required',
            'latitude' => '',
            'longitude' => ''
        ]);

        $device = Device::find($id);

        $model = $request->Input('model');
        $manufacturer = $request->Input('manufacturer');
        $product = $request->Input('product');
        $sdk_version = $request->Input('sdk_version');
        $serial_number = $request->Input('serial_number');
        $latitude = $request->Input('latitude');
        $longitude = $request->Input('longitude');

        $device->model = $model;
        $device->manufacturer = $manufacturer;
        $device->product = $product;
        $device->sdk_version = $sdk_version;
        $device->serial_number = $serial_number;
        $device->latitude = $latitude;
        $device->longitude =$longitude;

        $device->save();

        return Redirect::route('devices.show', [$device->id]);
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
        $device = Device::find($id);

        return Redirect::route('devices.index');
    }

    // Add notification to device
    public function addNotification(Request $request, $id) {
        $device = Device::find($id);

        $notification_id = $request->Input('notification_id');

        $device->notifications()->attach($notification_id);

        $device->save();

        return Redirect::route('devices.show', [$device->id]);
    }

    // Remove notification from a device
    public function removeNotification(Request $request, $id) {
        $device = Device::find($id);

        $notification_id = $request->Input('notification_id');

        $device->notifications()->detach($notification_id);

        $device->save();

        return Redirect::route('devices.show', [$device->id]);
    }

    // Register new device using api
    public function apiRegister(Request $request) {

        $model = $request->Input('model');
        $manufacturer = $request->Input('manufacturer');
        $product = $request->Input('product');
        $sdk_version = $request->Input('sdk_version');
        $serial_number = $request->Input('serial_number');
        $latitude = $request->Input('latitude');
        $longitude = $request->input('longitude');

        // Check if serial number exists in database
        $newDevice = Device::where('serial_number', '=', $serial_number)->first();

        if (null == $newDevice) {
            $newDevice = new Device();

            $newDevice->model = $model;
            $newDevice->manufacturer = $manufacturer;
            $newDevice->product = $product;
            $newDevice->sdk_version = $sdk_version;
            $newDevice->serial_number = $serial_number;
            $newDevice->latitude = $latitude;
            $newDevice->longitude = $longitude;

            $newDevice->save();
        } 

        return $newDevice->JsonSerializable();
    }

    public function apiShow(Request $request, $id) {
        $device = Device::find($id);

        return $device->JsonSerializable();
    }
}
