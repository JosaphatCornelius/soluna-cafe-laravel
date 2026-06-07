<?php

namespace App\Services;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ContactMessageService extends BaseService
{
    protected string $orderColumn = 'created_at';

    protected string $orderDirection = 'desc';

    protected function modelClass(): string
    {
        return ContactMessage::class;
    }

    public function create(array $data, ?User $user = null): Model
    {
        $data['status'] = $data['status'] ?? 'new';

        return parent::create($data, $user);
    }
}
