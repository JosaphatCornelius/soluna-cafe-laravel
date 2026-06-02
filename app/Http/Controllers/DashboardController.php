<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Content;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the CMS dashboard
     */
    public function index()
    {
        $contentCount = Content::count();
        $productCount = Product::count();
        $promotionCount = Promotion::count();
        $messageCount = ContactMessage::count();

        return view('cms.dashboard', [
            'contentCount' => $contentCount,
            'productCount' => $productCount,
            'promotionCount' => $promotionCount,
            'messageCount' => $messageCount,
        ]);
    }
}
