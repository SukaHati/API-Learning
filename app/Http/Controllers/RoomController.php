<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    //Ini untuk create
    public function store(Request $request) {
        $room = new Room();
        $room -> name = $request -> name;
        $room -> is_used = $request -> is_used;
        $room -> pic_url = $request -> pic_url;
        $room -> price = $request -> price;
        $room -> place_id = $request -> place_id;
        if($room -> save()) {
            return response() -> json(['success' => true, 'data' => $room]);
        }
        else {
            return response() -> json(['success' => false, 'data' => "room save failed!"]);
        }
    }

    //Ini untuk index
    public function index() {
        $rooms = Room::get();
        return response() -> json(['success' => true, 'data' => $rooms]);
    }

    //Ini untuk show
    public function show($id) {
        $room = Room::find($id);
        if($room) {
            return response() -> json(['success' => true, 'data' => $room]);
        }
    }

    //Ini untuk delete
    public function destroy($id) {
        $room = Place::find($id);
        if($room) {
            if($room -> delete()) {
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
