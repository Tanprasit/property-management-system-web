<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Redirect;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Needs to filter this to contractors only
        $contractors = User::all();

        return View('contractors.index', compact('contractors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('contractors.create');
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
        $fullName = $request->input('full_name');
        $password = bcrypt($request->input('password'));
        $email = $request->input('email');
        $mobile = $request->input('mobile');

        $newContractor = new User();

        $newContractor->full_name = $fullName;
        $newContractor->password = $password;
        $newContractor->email = $email;
        $newContractor->mobile = $mobile;

        $newContractor->save();

        return Redirect::route('contractors.show', [$newContractor->id]);
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
        $contractor = User::find($id);

        return View('contractors.show', compact('contractor'));
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
        $contractor = User::find($id);

        return View('contractors.edit', compact('contractor'));
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
        $user = User::find($id);

        $fullName = $request->input('full_name');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $status = $request->input('status');

        $user->full_name = $fullName;
        $user->email = $email;
        $user->mobile = $mobile;
        $user->status = $status;

        $user->save();

        return Redirect::route('contractors.index');
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
        $contractor = User::find($id);

        $contractor->delete();

        return Redirect::route('contractors.index');
    }
}
