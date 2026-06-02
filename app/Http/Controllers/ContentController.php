<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Models\Content;
use App\Services\ContentService;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    protected ContentService $contentService;

    public function __construct(ContentService $contentService)
    {
        $this->contentService = $contentService;
    }

    /**
     * Display a listing of content.
     */
    public function index()
    {
        $this->authorize('viewAny', Content::class);

        $contents = $this->contentService->getAll();

        return view('cms.content.index', ['contents' => $contents]);
    }

    /**
     * Show the form for editing the specified content.
     */
    public function create()
    {
        $this->authorize('create', Content::class);

        return view('cms.content.create');
    }

    /**
     * Store a newly created content in storage.
     */
    public function store(StoreContentRequest $request)
    {
        $this->authorize('create', Content::class);

        $this->contentService->create($request->validated(), auth()->user());

        return redirect()->route('cms.content.index')->with('success', 'Content page created successfully!');
    }

    public function edit(Content $content)
    {
        $this->authorize('update', $content);

        return view('cms.content.edit', ['content' => $content]);
    }

    /**
     * Update the specified content in storage.
     */
    public function update(UpdateContentRequest $request, Content $content)
    {
        $this->authorize('update', $content);

        $this->contentService->update($content, $request->validated(), auth()->user());

        return redirect()->route('cms.content.index')->with('success', 'Content updated successfully!');
    }

    /**
     * Remove the specified content from storage.
     */
    public function destroy(Content $content)
    {
        $this->authorize('delete', $content);

        $this->contentService->delete($content);

        return redirect()->route('cms.content.index')->with('success', 'Content page deleted successfully!');
    }

    /**
     * Display the specified content.
     */
    public function show(Content $content)
    {
        $this->authorize('view', $content);

        return view('cms.content.show', ['content' => $content]);
    }
}
