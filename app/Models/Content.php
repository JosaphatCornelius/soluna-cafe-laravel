<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'created_by',
        'updated_by',
    ];

    /**
     * Get the user who created this content
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this content
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
