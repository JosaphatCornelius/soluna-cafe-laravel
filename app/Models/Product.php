<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'image_url',
        'price',
        'created_by',
        'updated_by',
    ];

    /**
     * Get the user who created this product
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this product
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
