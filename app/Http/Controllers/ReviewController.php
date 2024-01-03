<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReviewRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    // CREATE review 
    public function create(Request $request)
    {
        return view('reviews.create');
    }

    public function createReview(Request $request)
    {
        dd("");
        $review = new Review([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $request->input('image')
        ]);
        $review->save();

        Session::flash('success', 'Review created successfully.');
        return redirect()->route('review.index');
    }

    // EDIT 
    public function edit(Request $request, $id)
    {
        $review = Review::find($id);
        return view('review.edit', compact('review'));
    }

    // UPDATE 
    public function update(UpdateUserRequest $request, $id)
    {
        $review = Review::find($id);

        if (!$review) {
            abort(404);
        }

        $review->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('review.index')->with('success', 'Review with id = ' . $review->id . ' was updated successfully!');
    }


    // DELETE 
    public function delete(Request $request, $id)
    {
        $review = Review::find($id);

        if ($review) {
            $review->delete();
            return redirect()->route('review.index')->with('success', 'Review with id = ' . $review->id . ' was deleted successfully!');
        } else {
            abort(404);
        }
    }
}
