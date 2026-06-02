<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Services\ContactMessageService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected ContactMessageService $contactMessageService;

    public function __construct(ContactMessageService $contactMessageService)
    {
        $this->contactMessageService = $contactMessageService;
    }

    public function index()
    {
        return view('contact');
    }

    public function submit(StoreContactMessageRequest $request)
    {
        $this->contactMessageService->create($request->validated());

        return back()->with('status', 'Thanks — we received your message.');
    }
}
