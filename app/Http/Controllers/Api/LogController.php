<?php

namespace App\Http\Controllers\Api;

use App\Models\Log;
use Illuminate\Http\Request;
use App\Http\Resources\LogResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\LogCollection;
use App\Http\Requests\LogStoreRequest;
use App\Http\Requests\LogUpdateRequest;

class LogController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Log::class);

        $search = $request->get('search', '');

        $logs = Log::search($search)
            ->latest()
            ->paginate();

        return new LogCollection($logs);
    }

    /**
     * @param \App\Http\Requests\LogStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogStoreRequest $request)
    {
        $this->authorize('create', Log::class);

        $validated = $request->validated();
        $validated['data'] = json_decode($validated['data'], true);

        $log = Log::create($validated);

        return new LogResource($log);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Log $log
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Log $log)
    {
        $this->authorize('view', $log);

        return new LogResource($log);
    }

    /**
     * @param \App\Http\Requests\LogUpdateRequest $request
     * @param \App\Models\Log $log
     * @return \Illuminate\Http\Response
     */
    public function update(LogUpdateRequest $request, Log $log)
    {
        $this->authorize('update', $log);

        $validated = $request->validated();

        $validated['data'] = json_decode($validated['data'], true);

        $log->update($validated);

        return new LogResource($log);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Log $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Log $log)
    {
        $this->authorize('delete', $log);

        $log->delete();

        return response()->noContent();
    }
}
