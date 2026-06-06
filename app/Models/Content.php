<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    /** Slugs that make up the public About Us page. */
    public const ABOUT_SLUGS = ['about-story', 'about-chef', 'about-awards'];

    protected $fillable = [
        'slug',
        'title',
        'description',
        'image_url',
        'created_by',
        'updated_by',
    ];

    public function isAboutSection(): bool
    {
        return in_array($this->slug, self::ABOUT_SLUGS, true);
    }

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
