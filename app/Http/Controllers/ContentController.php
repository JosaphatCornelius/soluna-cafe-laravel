<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateContentRequest;
use App\Models\Content;
use App\Services\ContentService;

class ContentController extends Controller
{
    protected ContentService $contentService;

    public function __construct(ContentService $contentService)
    {
        $this->contentService = $contentService;
    }

    /**
     * Display a listing of content, excluding the About Us sections which have
     * their own module.
     */
    public function index()
    {
        $this->authorize('viewAny', Content::class);

        $contents = $this->contentService->getExcludingSlugs(Content::ABOUT_SLUGS);

        return view('cms.content.index', ['contents' => $contents]);
    }

    /**
     * Display the About Us sections (Story, Chef, Awards) for editing.
     */
    public function about()
    {
        $this->authorize('viewAny', Content::class);

        $sections = $this->contentService->getBySlugs(Content::ABOUT_SLUGS);

        return view('cms.about.index', ['sections' => $sections]);
    }

    public function edit(Content $content)
    {
        $this->authorize('update', $content);

        $backRoute = $content->isAboutSection() ? 'cms.about.index' : 'cms.content.index';

        return view('cms.content.edit', ['content' => $content, 'backRoute' => $backRoute]);
    }

    /**
     * Update the specified content in storage.
     */
    public function update(UpdateContentRequest $request, Content $content)
    {
        $this->authorize('update', $content);

        $this->contentService->update($content, $request->validated(), auth()->user());

        $listRoute = $content->isAboutSection() ? 'cms.about.index' : 'cms.content.index';

        return redirect()->route($listRoute)->with('success', 'Content updated successfully!');
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
