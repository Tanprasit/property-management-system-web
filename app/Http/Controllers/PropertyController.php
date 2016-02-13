<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Property;

class PropertyController extends Controller {

    public function index() {

        $properties = Property::all();
        return View('properties')->with('properties');
    }
}

 ?>