<?php

namespace App\Http\Controllers\Api;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContentResource;
use App\Http\Resources\ContentCollection;
use App\Http\Requests\ContentStoreRequest;
use App\Http\Requests\ContentUpdateRequest;

class ContentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Content::class);

        $search = $request->get('search', '');

        $contents = Content::search($search)
            ->latest()
            ->paginate();

        return new ContentCollection($contents);
    }

    /**
     * @param \App\Http\Requests\ContentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentStoreRequest $request)
    {
        $this->authorize('create', Content::class);

        $validated = $request->validated();

        $content = Content::create($validated);

        return new ContentResource($content);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Content $content
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Content $content)
    {
        $this->authorize('view', $content);

        return new ContentResource($content);
    }

    /**
     * @param \App\Http\Requests\ContentUpdateRequest $request
     * @param \App\Models\Content $content
     * @return \Illuminate\Http\Response
     */
    public function update(ContentUpdateRequest $request, Content $content)
    {
        $this->authorize('update', $content);

        $validated = $request->validated();

        $content->update($validated);

        return new ContentResource($content);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Content $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Content $content)
    {
        $this->authorize('delete', $content);

        $content->delete();

        return response()->noContent();
    }
}
