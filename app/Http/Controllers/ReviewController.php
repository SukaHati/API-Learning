<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request, $id) {
        $review = new Review();
        $review -> rating = $request -> rating;
        $review -> comment = $request -> comment;
        $review->user_id = auth()->user()->id;
        $review -> place_id = $id;
        if($review -> save()) {
            return response() -> json(["success" => true, "data" => $review]);
        }
        else {
            return response() -> json(["success" => false, "data" => "error happen during save"]);
        }
    }

    public function index($id) {
        $reviews = Review::where('place_id', $id) -> get();
        return response() -> json(["success" => true, "data" => $reviews]);
    }


}
