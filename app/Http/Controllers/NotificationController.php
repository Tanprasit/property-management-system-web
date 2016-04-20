<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;

use App\Notification;
use Redirect;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notifications = Notification::all();

        return View('notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('notifications.create');
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
            'title' => 'required',
            'type' => 'required',
            'notes' => '',
            'data' => 'required'
        ]);

        $title = $request->Input('title');        
        $notes = $request->Input('notes');
        $type = $request->Input('type');
        $data = $request->Input('data');

        $notification = new Notification();

        $notification->title = $title;
        $notification->notes = $notes;
        $notification->type = $type;
        $notification->data = $data;

        $notification->save();

        $redirectURL = route('notifications.show', [$notification->id]);

        return response()->json(['redirectURL' => $redirectURL]);
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
        $notification = Notification::findOrFail($id);

        return View('notifications.show', compact('notification'));
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
        $notification = Notification::findOrFail($id);

        return  View('notifications.edit', compact('notification'));
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
            'title' => 'required',
            'type' => 'required',
            'notes' => '',
            'data' => 'required'
        ]);
        
        $notification = Notification::findOrFail($id);

        $title = $request->Input('title');        
        $notes = $request->Input('notes');
        $type = $request->Input('type');
        $data = $request->Input('data');

        $notification->title = $title;
        $notification->notes = $notes;
        $notification->type = $type;
        $notification->data = $data;

        $notification->save();

        $redirectURL = route('notifications.show', [$notification->id]);

        return response()->json(['redirectURL' => $redirectURL]);
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
        $notification = Notification::findOrFail($id);

        $notification->delete();

        return Redirect::route('notifications.index');
    }

    public function apiShow($id) {
        $notification = Notification::findOrFail($id);

        return $notification->jsonSerializable();
    }
}
