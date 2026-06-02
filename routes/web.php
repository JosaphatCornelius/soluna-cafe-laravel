<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RecommendationController;
use App\Models\Content;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Recommendation;

// Public routes
Route::get('/', function () {
    $story = Content::where('slug', 'home')->first();

    $recommendations = Recommendation::orderBy('id')->get()->map(function (Recommendation $recommendation) {
        $image = $recommendation->image_url;
        if ($image && !filter_var($image, FILTER_VALIDATE_URL)) {
            $image = asset($image);
        }

        return [
            'name' => $recommendation->name,
            'src' => $image ?: asset('images/avocado.jpg'),
        ];
    })->values()->toArray();

    return view('welcome', compact('story', 'recommendations'));
});

Route::get('/product', function () {
    $categories = Product::orderBy('category')
        ->get()
        ->groupBy(fn (Product $product) => $product->category ?: 'Menu')
        ->map(fn ($items) => $items->map(fn (Product $product) => [
            'image' => ($product->image_url && !filter_var($product->image_url, FILTER_VALIDATE_URL))
                ? asset($product->image_url)
                : ($product->image_url ?: asset('images/avocado.jpg')),
            'title' => $product->name,
            'description' => $product->description,
            'price' => 'Rp ' . number_format($product->price ?? 0, 0, ',', '.'),
        ])->toArray())
        ->toArray();

    return view('product', compact('categories'));
});

Route::get('/promotion', function () {
    $slides = Promotion::where('active', true)
        ->get()
        ->map(fn (Promotion $promotion) => [
            'title' => $promotion->tag ?? 'Promotion',
            'subtitle' => $promotion->title,
            'description' => $promotion->description,
            'tag' => $promotion->tag ?? 'Featured',
            'image' => ($promotion->image_url && !filter_var($promotion->image_url, FILTER_VALIDATE_URL))
                ? asset($promotion->image_url)
                : ($promotion->image_url ?: asset('images/promotions/promo-slide.png')),
            'cta' => $promotion->cta ?? 'Learn more',
        ])
        ->toArray();

    return view('promotion', compact('slides'));
})->name('promotion');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// CMS routes - Protected by auth and role middleware
Route::middleware(['auth', 'editorOrAdmin'])->prefix('cms')->name('cms.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Content management
    Route::get('/content', [ContentController::class, 'index'])->name('content.index');
    Route::get('/content/create', [ContentController::class, 'create'])->name('content.create');
    Route::post('/content', [ContentController::class, 'store'])->name('content.store');
    Route::get('/content/{content}/edit', [ContentController::class, 'edit'])->name('content.edit');
    Route::put('/content/{content}', [ContentController::class, 'update'])->name('content.update');
    Route::delete('/content/{content}', [ContentController::class, 'destroy'])->name('content.destroy');
    Route::get('/content/{content}', [ContentController::class, 'show'])->name('content.show');
    
    // Product management
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Promotion management
    Route::get('/promotions', [PromotionController::class, 'index'])->name('promotions.index');
    Route::get('/promotions/create', [PromotionController::class, 'create'])->name('promotions.create');
    Route::post('/promotions', [PromotionController::class, 'store'])->name('promotions.store');
    Route::get('/promotions/{promotion}/edit', [PromotionController::class, 'edit'])->name('promotions.edit');
    Route::put('/promotions/{promotion}', [PromotionController::class, 'update'])->name('promotions.update');
    Route::delete('/promotions/{promotion}', [PromotionController::class, 'destroy'])->name('promotions.destroy');
    Route::get('/promotions/{promotion}', [PromotionController::class, 'show'])->name('promotions.show');

    // Recommendation management (homepage recommendation carousel)
    Route::get('/recommendations', [RecommendationController::class, 'index'])->name('recommendations.index');
    Route::get('/recommendations/create', [RecommendationController::class, 'create'])->name('recommendations.create');
    Route::post('/recommendations', [RecommendationController::class, 'store'])->name('recommendations.store');
    Route::get('/recommendations/{recommendation}/edit', [RecommendationController::class, 'edit'])->name('recommendations.edit');
    Route::put('/recommendations/{recommendation}', [RecommendationController::class, 'update'])->name('recommendations.update');
    Route::delete('/recommendations/{recommendation}', [RecommendationController::class, 'destroy'])->name('recommendations.destroy');

    // Contact messages
    Route::get('/contacts', [ContactMessageController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contactMessage}', [ContactMessageController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('contacts.destroy');
});
