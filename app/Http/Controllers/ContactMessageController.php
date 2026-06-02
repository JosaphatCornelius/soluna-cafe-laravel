<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Services\ContactMessageService;

class ContactMessageController extends Controller
{
    protected ContactMessageService $contactMessageService;

    public function __construct(ContactMessageService $contactMessageService)
    {
        $this->contactMessageService = $contactMessageService;
    }

    public function index()
    {
        $this->authorize('viewAny', ContactMessage::class);

        $messages = $this->contactMessageService->getAll();

        return view('cms.contacts.index', ['messages' => $messages]);
    }

    public function show(ContactMessage $contactMessage)
    {
        $this->authorize('view', $contactMessage);

        return view('cms.contacts.show', ['message' => $contactMessage]);
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $this->authorize('delete', $contactMessage);

        $this->contactMessageService->delete($contactMessage);

        return redirect()->route('cms.contacts.index')->with('success', 'Message deleted successfully.');
    }
}
