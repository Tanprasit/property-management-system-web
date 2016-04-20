<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Key;
use App\User;
use App\Property;
use Redirect;

class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $keys = Key::all();

        return View('keys.index', compact('keys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $contractors = User::all()->sortBy('full_name');;

        $properties = Property::all();

        return View('keys.create', compact(['contractors', 'properties']));
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
            'taken_at' => '',
            'return_at' => '',
            'user_id' => 'required',
            'property_id' =>'required',
            'pin' => 'required'
        ]);

        $takenAt = $request->input('taken_at');
        $returnedAt = $request->input('returned_at');
        $userId = $request->input('user_id');
        $propertyId = $request->input('property_id');
        $pin = $request->input('pin');

        $newKey = new Key();

        $newKey->taken_at = $takenAt;
        $newKey->returned_at = $returnedAt;
        $newKey->user_id = $userId;
        $newKey->property_id = $propertyId;
        $newKey->pin = $pin;

        $newKey->save();

        return Redirect::route('keys.show', [$newKey->id]);
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
        $key = Key::with('contractor')->find($id);

        return View('keys.show' , compact(['key']));
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
        $key = Key::find($id);

        $contractors = User::all()->sortBy('full_name');;

        $properties = Property::all();

        return View('keys.edit', compact(['key', 'contractors', 'properties']));
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
            'taken_at' => '',
            'return_at' => '',
            'user_id' => 'required',
            'property_id' =>'required',
            'pin' => 'required'
        ]);

        $takenAt = $request->input('taken_at');
        $returnedAt = $request->input('returned_at');
        $userId = $request->input('user_id');
        $propertyId = $request->input('property_id');
        $pin = $request->input('pin');

        $key = Key::find($id);

        $key->taken_at = $takenAt;
        $key->returned_at = $returnedAt;
        $key->user_id = $userId;
        $key->property_id = $propertyId;
        $key->pin = $pin;

        $key->save();

        return Redirect::route('keys.show', [$key->id]);

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
        $key = Key::find($id);

        $key->delete();

        return Redirect::route('keys.index');
    }

    public function  apiGetContractorKeys(Request $request, $id) {
        // Eager loaded contractor details along with property details. Saves extra database hits.
        $contractor = User::with(['keys.property', 'keys.contractor'])->find($id);

        $keyList = [];

        foreach ($contractor->keys as $value) {
            # code...
            $keyList[] = $value->jsonSerializable();
        }

        return $keyList;
    }

    // API for updating key with time taken.
    public function apiUpdateTimeTaken(Request $request) {
        $keyId = $request->Input('id');
        $takenAt = $request->Input('taken_at');

        $message = "";
        $error = true;

        try {
            $key = Key::find($keyId);
            $key->taken_at = $takenAt;

            $verify = $key->save();

            $message = "Time taken updated successfully.";
            $error = false;
        } catch(\Exception $e) {
            $message = "Failed to update key taken time.";
        }
        return ($error == true) 
            ? response($message, 403)
            : response($message, 200);
    }

    // API for updating key with time returned.
    public function apiUpdateTimeReturned(Request $request) {
        $keyId = $request->Input('id');
        $returnedAt = $request->Input('returned_at');

        $message = "";
        $error = true;

        try {
            $key = Key::find($keyId);

            $key->returned_at = $returnedAt;

            $verify = $key->save();

            $message = "Time returned updated successfully.";
            $error = false;
        } catch(\Exception $e) {
            $message = "Failed to update key returned time.";
        }
        return ($error = true) 
            ? response($message, 403)
            : response($message, 200);
    }

        // Add new contractor to key. Id is contractor id.
    public function addContractor(Request $request, $id)  {

        $contractorId = $request->Input('contractor_id');

        $key = Key::find($id);

        $contractor = User::find($contractorId);

        $contractor->keys()->save($key);

        $contractor->save();

        return Redirect::route('keys.show', $id);
    }

    // Remove  contractor from key. Id is contractor id.
    public function removeContractor(Request $request, $id) {
        $contractorId = $request->Input('contractor_id');

        $contractor = User::find($keyId);

        $contractor->keys()->find($id)->delete();

        return Redirect::route('keys.show', $id);
    }
}