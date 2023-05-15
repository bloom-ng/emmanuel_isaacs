<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.contents.index', compact('contents', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Content::class);

        return view('app.contents.create');
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

        return redirect()
            ->route('contents.edit', $content)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Content $content
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Content $content)
    {
        $this->authorize('view', $content);

        return view('app.contents.show', compact('content'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Content $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Content $content)
    {
        $this->authorize('update', $content);

        return view('app.contents.edit', compact('content'));
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

        return redirect()
            ->route('contents.edit', $content)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('contents.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
