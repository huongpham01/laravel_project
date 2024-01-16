<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReviewRequest;
use App\Http\Requests\DuplicateReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Category;

use App\Services\ReviewService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    protected $service;

    public function __construct(ReviewService $userService)
    {
        $this->service = $userService;
    }

    // INDEX
    public function index(Request $request)
    {
        $params = $request->toArray();
        $reviews = $this->service->index($params);
        return view('reviews.index', ['reviews' => $reviews]);
    }

    // CREATE
    public function create(Request $request)
    {

        return view('reviews.form');
    }

    public function createReview(CreateReviewRequest $request)
    {
        $user = Auth::user();
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $fileName);
        $review = new Review([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $user->id,
            'image' => $fileName,
            'status' => $request->has('status') ? 1 : 0,
        ]);
        $review->save();
        $categories = $request->input('category');


        foreach ($categories as $category) {
            $data = new Category([
                'review_id' => $review->id,
                'category_id' => $category,
            ]);
            $data->save();
        }

        Session::flash('success', 'Review created successfully.');
        return redirect()->route('review.index');
    }

    public function view(Request $request)
    {
        $review = Review::with('user')->find($request->id);
        return view('reviews.view', compact('review'));
    }

    // UPLOAD IMAGE

    public function imageUploadPost(Request $request)
    {
        // GENERATE FILE NAME
        $fileName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $fileName);

        /* Store $fileName name in DATABASE from HERE */

        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $fileName);
    }
    // EDIT 
    public function edit(Request $request, $id)
    {
        $review = Review::find($id);
        return view('reviews.form', compact('review'));
    }

    // UPDATE 
    public function update(UpdateReviewRequest $request, $id)
    {
        $review = Review::find($id);
        // $review->update($request->all());
        if (!$review) {
            abort(404);
        }
        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $fileName);
            // Update the review with the new image
            $review->update(['image' => $fileName]);
        }

        $review->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        // Update or create categories
        $categories = $request->input('category');
        // Soft delete old value to get new value of category
        $review->categories()->delete();
        // Physical delete
        // $review->categories()->forceDelete();

        foreach ($categories as $category) {
            $data = new Category([
                'review_id' => $review->id,
                'category_id' => $category,
            ]);
            $data->save();
        }

        return redirect()->route('review.index', ['id' => $review->id])->with('success', 'Review with id = ' . $review->id . ' was updated successfully!');
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

    // Get DUPLICATE review
    public function duplicate(Request $request, $id)
    {
        $review = Review::find($id);
        // Check if the review exists
        if (!$review) {
            abort(404);
        }

        return view('reviews.copy', compact('review'));
    }

    // Post DUPLICATE review
    public function duplicateReview(DuplicateReviewRequest $request, $id)
    {
        $review = Review::find($id);
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $fileName);
            // Update the review with the new image
            $review->duplicateReview(['image' => $fileName]);
        }

        if ($review) {
            // Duplicate the review
            $newReview = $review->replicate();
            $newReview->title = $request->input('title');
            $newReview->created_at = now();
            $newReview->updated_at = now();

            $newReview->save();
            $categories = $request->input('category');
            foreach ($categories as $category) {
                $data = new Category([
                    'review_id' => $newReview->id,
                    'category_id' => $category,
                ]);
                $data->save();
            }

            // Save the duplicated Review 
            $newReview->save();

            return redirect()->route('review.index')->with('success', 'Review duplicated successfully');
        } else {
            return redirect()->route('review.index')->with('error', 'Copy again!');
        }
    }

    // SORT
    public function sort(Request $request)
    {
        $reviews = Review::sortable()->paginate(10);
        return view('reviews.index', compact('reviews'));
    }
}
