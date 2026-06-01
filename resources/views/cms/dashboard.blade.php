@extends('layouts.cms')

@section('title', 'Dashboard')

@section('content')
    <section id="overview" class="space-y-8">
        @include('components.cms.section-header', [
            'eyebrow' => 'Overview',
            'title' => 'Manage the cafe content from one simple place.',
            'description' => 'This dashboard is a lightweight preview of the CMS structure. It is designed to be easy to expand once the backend is connected.',
        ])

        <div class="grid gap-5 lg:grid-cols-4">
            @include('components.cms.stat-card', ['label' => 'Published Pages', 'value' => '05', 'note' => 'Home, Products, Promotions, Contact, About'])
            @include('components.cms.stat-card', ['label' => 'Promo Drafts', 'value' => '03', 'note' => 'Campaigns waiting for approval or content updates'])
            @include('components.cms.stat-card', ['label' => 'Pending Messages', 'value' => '12', 'note' => 'Contact submissions that will land here later'])
            @include('components.cms.stat-card', ['label' => 'Media Assets', 'value' => '48', 'note' => 'Images currently used across the website'])
        </div>
    </section>

    <section id="homepage" class="mt-10 rounded-[28px] border border-[#dbcdbd] bg-white p-6 shadow-[0px_20px_50px_rgba(0,0,0,0.06)] md:p-8">
        @include('components.cms.section-header', [
            'eyebrow' => 'Content queue',
            'title' => 'Quick edit queue',
            'description' => 'These are the first content areas most likely to change. They can later map directly to backend modules or records.',
        ])

        <div class="overflow-hidden rounded-[22px] border border-[#e5dbcf]">
            <div class="grid grid-cols-[1.2fr_0.8fr_0.7fr_0.7fr] gap-4 bg-[#f6efe4] px-5 py-4 font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.25em] text-[#8f5a3a]">
                <div>Section</div>
                <div>Status</div>
                <div>Last edit</div>
                <div>Action</div>
            </div>

            @php
                $rows = [
                    ['section' => 'Homepage hero', 'status' => 'Ready', 'updated' => 'Today', 'action' => 'Replace banner'],
                    ['section' => 'Product menu', 'status' => 'Draft', 'updated' => 'Yesterday', 'action' => 'Update items'],
                    ['section' => 'Promotions', 'status' => 'Ready', 'updated' => '2 days ago', 'action' => 'Refresh deal'],
                    ['section' => 'Contact section', 'status' => 'Ready', 'updated' => 'This week', 'action' => 'Edit details'],
                ];
            @endphp

            <div class="divide-y divide-[#e5dbcf] bg-white">
                @foreach ($rows as $row)
                    <div class="grid grid-cols-1 gap-4 px-5 py-5 md:grid-cols-[1.2fr_0.8fr_0.7fr_0.7fr] md:items-center">
                        <div>
                            <p class="font-['Host_Grotesk'] text-[16px] font-bold text-[#241810]">{{ $row['section'] }}</p>
                            <p class="mt-1 font-['Host_Grotesk'] text-[14px] text-[#5d4a3d]">Simple placeholder entry for the future CMS.</p>
                        </div>
                        <div>
                            <span class="inline-flex rounded-full bg-[#f0f0e6] px-3 py-1 font-['Host_Grotesk'] text-[13px] font-bold text-[#3f2719]">{{ $row['status'] }}</span>
                        </div>
                        <div class="font-['Host_Grotesk'] text-[15px] text-[#5d4a3d]">{{ $row['updated'] }}</div>
                        <div>
                            <button type="button" class="rounded-full bg-[#3f2719] px-4 py-2 font-['Host_Grotesk'] text-[14px] font-bold text-white transition-colors duration-200 hover:bg-[#2a1a13]">
                                {{ $row['action'] }}
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="promotions" class="mt-10 grid gap-6 lg:grid-cols-[1fr_0.95fr]">
        <div class="rounded-[28px] bg-[#3f2719] p-7 text-white shadow-[0px_20px_50px_rgba(0,0,0,0.12)]">
            <p class="font-['Host_Grotesk'] text-[12px] font-bold uppercase tracking-[0.35em] text-white/55">Next steps</p>
            <h2 class="mt-3 font-['Host_Grotesk'] text-[clamp(1.5rem,3vw,2.4rem)] font-bold leading-tight text-white">Build once, connect later.</h2>
            <p class="mt-4 max-w-140 font-['Host_Grotesk'] text-[16px] leading-relaxed text-white/78">
                The dashboard is currently just a presentation layer. Once the backend is ready, each panel can map to a content model or editor screen.
            </p>

            <div class="mt-8 grid gap-4 sm:grid-cols-2">
                <div class="rounded-[20px] bg-white/10 p-4">
                    <p class="text-[12px] uppercase tracking-[0.28em] text-white/55">Promotions</p>
                    <p class="mt-2 font-['Host_Grotesk'] text-[18px] font-bold text-white">Update banners, copy, and featured deals.</p>
                </div>
                <div class="rounded-[20px] bg-white/10 p-4">
                    <p class="text-[12px] uppercase tracking-[0.28em] text-white/55">Media</p>
                    <p class="mt-2 font-['Host_Grotesk'] text-[18px] font-bold text-white">Organize cafe photos and campaign images.</p>
                </div>
            </div>
        </div>

        <div id="messages" class="rounded-[28px] border border-[#dbcdbd] bg-white p-7 shadow-[0px_20px_50px_rgba(0,0,0,0.06)]">
            <p class="font-['Host_Grotesk'] text-[12px] font-bold uppercase tracking-[0.35em] text-[#8f5a3a]">Quick actions</p>
            <h3 class="mt-3 font-['Host_Grotesk'] text-[clamp(1.35rem,2.5vw,2rem)] font-bold leading-tight text-[#241810]">Simple controls for now</h3>

            <div class="mt-6 space-y-3">
                <button type="button" class="w-full rounded-[18px] border border-[#d8c9b7] bg-[#f6efe4] px-5 py-4 text-left font-['Host_Grotesk'] text-[16px] font-bold text-[#241810] transition-colors duration-200 hover:bg-[#efe4d4]">
                    Edit homepage hero copy
                </button>
                <button type="button" class="w-full rounded-[18px] border border-[#d8c9b7] bg-[#f6efe4] px-5 py-4 text-left font-['Host_Grotesk'] text-[16px] font-bold text-[#241810] transition-colors duration-200 hover:bg-[#efe4d4]">
                    Add a new promotion tile
                </button>
                <button type="button" class="w-full rounded-[18px] border border-[#d8c9b7] bg-[#f6efe4] px-5 py-4 text-left font-['Host_Grotesk'] text-[16px] font-bold text-[#241810] transition-colors duration-200 hover:bg-[#efe4d4]">
                    Review incoming contact messages
                </button>
                <button type="button" class="w-full rounded-[18px] border border-[#d8c9b7] bg-[#f6efe4] px-5 py-4 text-left font-['Host_Grotesk'] text-[16px] font-bold text-[#241810] transition-colors duration-200 hover:bg-[#efe4d4]">
                    Upload more media assets
                </button>
            </div>

            <div id="media" class="mt-6 rounded-[22px] bg-[#f0f0e6] p-5">
                <p class="font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.28em] text-[#8f5a3a]">Storage note</p>
                <p class="mt-2 font-['Host_Grotesk'] text-[15px] leading-relaxed text-[#5d4a3d]">This screen is intentionally static for now. Connect it to the CMS when the backend is ready.</p>
            </div>
        </div>
    </section>
@endsection