<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;

class FacilityController extends Controller
{
    //Ini untuk create
    public function store(Request $request) {
        $facility = new Facility();
        $facility -> name = $request -> name;
        if($facility -> save()) {
            return response() -> json(['success' => true, 'data' => $facility]);
        }
        else {
            return response() -> json(['success' => false, 'data' => 'save data failed!']);
        }
    }

    //Ini untuk index
    public function index() {
        $facilities = Facility::get();
        return response() -> json(['success' => true, 'data' => $facilities]);
    }

    //Ini untuk show
    public function show($id) {
        $facility = Facility::find($id);
        if($facility) {
            return response() -> json(['success' => true, 'data' => $facility]);
        }
        else {
            return response() -> json(['success' => false, 'data' => 'data is not found!']);
        }
    }

    //Ini untuk update
    public function update(Request $request) {
        $facility = Facility::find($id);
        if($facility) {
            $facility -> name = $request -> name;
            if($facility -> save()) {
                return response() -> json(['success' => true, 'data' => $facility]);
            }
            else {
                return response() -> json(['success' => true, 'data' => 'update facility failed']);
            }
        }
        else {
            return response() -> json(['success' => false, 'data' => 'data not found!']);
        }
    }

    //Ini untuk delete
    public function destroy($id) {
        $facility = Facility::find($id);
        if($facility) {
            if($facility -> delete()) {
                return response() -> json(['success' => true, 'data' => 'data successfully deleted']);
            }
            else {
                return response() -> json(['success' => true, 'data' => 'data is failed to delete!']);
            }
        }
        else {
            return response() -> json(['success' => false, 'data' => 'data is not founded!']);
        }
    }
}
