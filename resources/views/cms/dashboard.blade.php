@extends('layouts.cms')

@section('title', 'Dashboard')

@section('content')
    <section id="overview" class="space-y-8">
        @include('components.cms.section-header', [
            'eyebrow' => 'Overview',
            'title' => 'Manage the cafe content from one simple place.',
            'description' => 'Real-time stats from your CMS database.',
        ])

        <div class="grid gap-5 lg:grid-cols-4">
            @include('components.cms.stat-card', ['label' => 'Content Pages', 'value' => $contentCount, 'note' => 'Home, About, Contact & more'])
            @include('components.cms.stat-card', ['label' => 'Products', 'value' => $productCount, 'note' => 'Items in your product catalog'])
            @include('components.cms.stat-card', ['label' => 'Promotions', 'value' => $promotionCount, 'note' => 'Active promotions and offers'])
            @include('components.cms.stat-card', ['label' => 'Messages', 'value' => $messageCount, 'note' => 'Contact form submissions'])
        </div>
    </section>

    <section id="content-management" class="mt-10 rounded-[28px] border border-[#dbcdbd] bg-white p-6 shadow-[0px_20px_50px_rgba(0,0,0,0.06)] md:p-8">
        @include('components.cms.section-header', [
            'eyebrow' => 'Quick Links',
            'title' => 'Content Management',
            'description' => 'Access the main CMS features quickly.',
        ])

        <div class="grid gap-4 grid-cols-1 md:grid-cols-2">
            <a href="{{ route('cms.content.index') }}" class="rounded-[16px] border border-[#e5dbcf] bg-[#f9f6f2] p-6 hover:bg-[#f0ebe4] transition-colors">
                <p class="font-['Host_Grotesk'] text-[14px] font-bold uppercase tracking-[0.25em] text-[#8f5a3a]">Content Pages</p>
                <h3 class="mt-2 font-['Host_Grotesk'] text-[20px] font-bold text-[#241810]">Manage Pages</h3>
                <p class="mt-1 text-[14px] text-[#5d4a3d]">Edit homepage, about us, contact & more</p>
            </a>

            <a href="{{ route('cms.products.index') }}" class="rounded-[16px] border border-[#e5dbcf] bg-[#f9f6f2] p-6 hover:bg-[#f0ebe4] transition-colors">
                <p class="font-['Host_Grotesk'] text-[14px] font-bold uppercase tracking-[0.25em] text-[#8f5a3a]">Products</p>
                <h3 class="mt-2 font-['Host_Grotesk'] text-[20px] font-bold text-[#241810]">{{ $productCount }} Products</h3>
                <p class="mt-1 text-[14px] text-[#5d4a3d]">Add, edit, or remove products from catalog</p>
            </a>
        </div>
    </section>
@endsection