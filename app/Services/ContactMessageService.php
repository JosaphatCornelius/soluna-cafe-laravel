<?php

namespace App\Services;

use App\Models\ContactMessage;

class ContactMessageService
{
    public function getAll()
    {
        return ContactMessage::orderByDesc('created_at')->get();
    }

    public function getById($id)
    {
        return ContactMessage::findOrFail($id);
    }

    public function create(array $data): ContactMessage
    {
        $data['status'] = $data['status'] ?? 'new';

        return ContactMessage::create($data);
    }

    public function delete(ContactMessage $message): bool
    {
        return $message->delete();
    }
}
