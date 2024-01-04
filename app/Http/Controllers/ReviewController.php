<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public $reviews;
    public function index(Request $request)
    {
        $reviews = Review::with('user')->get();
        return view('reviews.index', ['reviews' => $reviews]);
    }

    // CREATE review 
    public function create(Request $request)
    {
        return view('reviews.create');
    }

    public function createReview(CreateReviewRequest $request)
    {
        $user = User::all();
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);
        $reviews = new Review([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $user->id,
            'category' => $request->input('category') ?? 'default',
            'image' => $fileName,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        $reviews->save();

        Session::flash('success', 'Review created successfully.');
        return redirect()->route('review.index', compact('user'));
    }
    public function view(Request $request)
    {
        $review = Review::with('user')->find($request->id);
        return view('reviews.view', compact('review'));
    }

    // UPLOAD IMAGE

    public function imageUploadPost(Request $request)
    {

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */

        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $imageName);
    }
    // EDIT 
    public function edit(Request $request, $id)
    {
        $review = Review::find($id);
        return view('reviews.edit', compact('review'));
    }

    // UPDATE 
    public function update(UpdateReviewRequest $request, $id)
    {
        $review = Review::find($id);

        if (!$review) {
            abort(404);
        }

        // Check if a new image is provided in the request
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();

            // Store the uploaded image in the 'public/images' directory
            $request->image->storeAs('public/images', $fileName);

            // Update the review with the new image
            $review->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'image' => $fileName,
            ]);
        } else {
            // Update the review without changing the image
            $review->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
            ]);
        }


        return redirect()->route('review.view', ['id' => $review->id])->with('success', 'Review with id = ' . $review->id . ' was updated successfully!');
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
    public function showReview($id)
    {
        $review = Review::find($id);

        return view('reviews.view', ['reviews' => $review]);
    }
}
