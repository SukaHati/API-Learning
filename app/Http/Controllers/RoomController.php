<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    //Ini untuk create
    public function store(Request $request) {
        $room = new Room();
        $room -> name = $request -> name;
        $room -> user = $request -> user;
        $room -> is_used = $request -> is_used;
        if($room -> saved()) {
            return response() -> json(['success' => true, 'data' => $room]);
        }
        else {
            return response() -> json(['success' => false, 'data' => "room save failed!"]);
        }
    }

    //Ini untuk index
    public function index() {
        return response() -> json(['success' => true, 'data' => $room]);
    }

    //Ini untuk delete
    public function destroy($id) {
        $place = Place::find($id);
        if($place) {
            if($place -> delete()) {
                return response() -> json(['success' => true, 'data' => 'data deleted']);
            }
            else {
                return response() -> json(['success' => true, 'data' => 'data failed to delete']);
            }
        }
        else {
            return response() -> json(['sucess' => false, 'data' => 'data is not founded']);
        }
    }
}
