<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    //Ini untuk create
    public function store(Request $request) {
        $place = new Place();
        $place -> name = $request -> name;
        $place -> description = $request -> description;
        $place -> email = $request -> email;
        $place -> image_url = $request -> image_url;
        $place -> website_url = $request -> website_url;
        $place -> address = $request -> address;
        if($place -> save()) {
            return response() -> json(['success' => true, 'data' => $place]);
        }
        else {
            return response() -> json(['success' => false, 'data' => 'place failed']);
        }
    }

    //Ini untuk index
    public function index() {
        $places = Place::get();
        return response() -> json(['success' => true, 'data' => $places]);
    }

    //Ini untuk show
    public function show($id) {
        $place = Place::with('reviews')->with('reviews.user')->find($id);
        if($place) {
            return response() -> json(['success' => true, 'data' => $place]);
        }
        else {
            return response() -> json(['success' => false, 'data' => 'data is not found']);
        }
    }

    //Ini untuk update
    public function update(Request $request, $id) {
        $place = Place::find($id);
        if($place) {
            $place -> name = $request -> name;
            $place -> description = $request -> description;
            $place -> email = $request -> email;
            $place -> image_url = $request -> image_url;
            $place -> website_url = $request -> website_url;
            $place -> address = $request -> address;
            if($place -> save()) {
                return response() -> json(['success' => true, 'data' => $place]);
            }
            else {
                return response() -> json(['success' => false, 'data' => 'update place failed']);
            }
        }
        else {
            return response() -> json(['success' => false, 'data' => 'data is not found']);
        }
    }

    public function destroy($id) {
        $place = Place::find($id);
        if($place) {
            if($place -> delete()) {
                return response() -> json(['success' => true, 'data' => 'data successfully deleted']);
            }
            else {
                return response() -> json(['success' => true, 'data' => 'data deletion failed']);
            }
        }
        else {
            return response() -> json(['success' => false, 'data' => 'data is not found']);
        }
    }
}
