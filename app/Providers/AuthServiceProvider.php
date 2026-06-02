<?php

namespace App\Providers;

use App\Models\Content;
use App\Models\ContactMessage;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Recommendation;
use App\Policies\ContactMessagePolicy;
use App\Policies\ContentPolicy;
use App\Policies\ProductPolicy;
use App\Policies\PromotionPolicy;
use App\Policies\RecommendationPolicy;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Content::class => ContentPolicy::class,
        ContactMessage::class => ContactMessagePolicy::class,
        Product::class => ProductPolicy::class,
        Promotion::class => PromotionPolicy::class,
        Recommendation::class => RecommendationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
