<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\ReviewCollection;

class UserReviewsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $reviews = $user
            ->reviews()
            ->search($search)
            ->latest()
            ->paginate();

        return new ReviewCollection($reviews);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->authorize('create', Review::class);

        $validated = $request->validate([
            'rating' => ['required', 'max:255'],
            'message' => ['required', 'max:255', 'string'],
            'visibility' => ['required', 'boolean'],
            'product_id' => ['required', 'exists:products,id'],
        ]);

        $review = $user->reviews()->create($validated);

        return new ReviewResource($review);
    }
}
