@extends('layouts.app')

@section('title', 'Promotions')

@section('content')
    @include('components.promotions.hero')

    @include('components.promotions.intro', [
        'title' => 'Promotions',
        'description' => 'Below you’ll find our best deals and promotions. Made with your wallets in our mind, we have put up the most fabulous of deals! Check these deals out yourself in the comfort of your own home or do come visit us!',
    ])

    @include('components.promotions.carousel')

    <section class="bg-white px-6 py-16 md:px-15">
        <div class="mx-auto max-w-6xl grid gap-8 lg:grid-cols-3">
            <div class="rounded-3xl border border-[#e5dbcf] bg-[#faf5ef] p-8 shadow-sm">
                <span class="inline-flex rounded-full bg-[#8f5a3a] px-4 py-2 text-[12px] uppercase tracking-[0.3em] text-white">Seasonal</span>
                <h2 class="mt-5 text-2xl font-bold text-[#241810]">Fresh Flavors</h2>
                <p class="mt-4 text-[#5d4a3d]">Enjoy seasonal drinks, treats, and bundle offers curated around warm flavors and fresh ingredients.</p>
            </div>
            <div class="rounded-3xl border border-[#e5dbcf] bg-[#faf5ef] p-8 shadow-sm">
                <span class="inline-flex rounded-full bg-[#8f5a3a] px-4 py-2 text-[12px] uppercase tracking-[0.3em] text-white">Smart</span>
                <h2 class="mt-5 text-2xl font-bold text-[#241810]">Easy Value</h2>
                <p class="mt-4 text-[#5d4a3d]">Simple offers, clear savings, and delicious add-ons that make every visit feel special.</p>
            </div>
            <div class="rounded-3xl border border-[#e5dbcf] bg-[#faf5ef] p-8 shadow-sm">
                <span class="inline-flex rounded-full bg-[#8f5a3a] px-4 py-2 text-[12px] uppercase tracking-[0.3em] text-white">Warm</span>
                <h2 class="mt-5 text-2xl font-bold text-[#241810]">Comfort Ready</h2>
                <p class="mt-4 text-[#5d4a3d]">From cozy espresso pairings to gift-ready packages, each promotion brings a little extra warmth to your day.</p>
            </div>
        </div>
    </section>

    <section class="bg-[#f7f1e7] px-6 py-16 md:px-15">
        <div class="mx-auto max-w-5xl text-center">
            <p class="text-sm uppercase tracking-[0.35em] text-[#8f5a3a]">Why choose our promos?</p>
            <h2 class="mt-4 text-4xl font-bold text-[#241810]">Delightful moments, better value.</h2>
            <p class="mx-auto mt-4 max-w-3xl text-[#5d4a3d]">We keep our promotions easy to understand. Whether you want a quick afternoon treat or a full meal set, these offers are built to make your visit feel special.</p>
        </div>

        <div class="mt-12 grid gap-8 md:grid-cols-2">
            <div class="rounded-3xl bg-white p-8 shadow-sm">
                <h3 class="text-2xl font-bold text-[#241810]">Coffee + Pastry Pairings</h3>
                <p class="mt-3 text-[#5d4a3d]">Save more when you pair your favorite brew with freshly baked pastries, all in one comfortably priced set.</p>
            </div>
            <div class="rounded-3xl bg-white p-8 shadow-sm">
                <h3 class="text-2xl font-bold text-[#241810]">Happy Hour Flavors</h3>
                <p class="mt-3 text-[#5d4a3d]">Enjoy selected espresso drinks and sweets at a special rate during our late afternoon happy hour.</p>
            </div>
        </div>
    </section>

    @include('components.promotions.contact')
@endsection