@extends('layouts.cms')

@section('title', $promotion->title)

@section('content')
    <section class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="font-['Host_Grotesk'] text-[12px] font-bold uppercase tracking-[0.35em] text-[#8f5a3a]">Promotion</p>
                <h1 class="mt-2 font-['Host_Grotesk'] text-[32px] font-bold text-[#241810]">{{ $promotion->title }}</h1>
            </div>
            <a href="{{ route('cms.promotions.index') }}" class="text-amber-600 hover:text-amber-700 font-bold">← Back to promotions</a>
        </div>

        <div class="rounded-[22px] border border-[#dbcdbd] bg-white p-8">
            <div class="prose prose-sm max-w-none text-[#5d4a3d]">
                {!! nl2br(e($promotion->description)) !!}
            </div>

            @if ($promotion->image_url)
                <div class="mt-8 overflow-hidden rounded-[20px] border border-[#e5dbcf] bg-[#f9f6f2]">
                    <img src="{{ $promotion->image_url }}" alt="{{ $promotion->title }}" class="w-full object-cover" />
                </div>
            @endif
        </div>

        <div class="rounded-[22px] border border-[#e5dbcf] bg-[#f9f6f2] p-6">
            <div class="grid grid-cols-2 gap-4 text-[14px] text-[#5d4a3d]">
                <div>
                    <p class="font-bold">Status</p>
                    <p>{{ $promotion->active ? 'Active' : 'Inactive' }}</p>
                </div>
                <div>
                    <p class="font-bold">Created</p>
                    <p>{{ $promotion->created_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
