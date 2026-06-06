@extends('layouts.cms')

@section('title', $product->name)

@section('content')
    <section class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="font-['Host_Grotesk'] text-[12px] font-bold uppercase tracking-[0.35em] text-[#8f5a3a]">Preview</p>
                <h1 class="mt-2 font-['Host_Grotesk'] text-[32px] font-bold text-[#241810]">{{ $product->name }}</h1>
            </div>
            <div class="flex gap-3">
                @can('update', $product)
                    <a href="{{ route('cms.products.edit', $product->id) }}" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded-lg text-[14px]">
                        Edit
                    </a>
                @endcan
                <a href="{{ route('cms.products.index') }}" class="text-amber-600 hover:text-amber-700 font-bold">
                    ← Back to list
                </a>
            </div>
        </div>

        <div class="rounded-[22px] border border-[#dbcdbd] bg-white p-8">
            <div class="prose prose-sm max-w-none">
                {!! nl2br(e($product->description)) !!}
            </div>
        </div>

        <div class="rounded-[22px] border border-[#e5dbcf] bg-[#f9f6f2] p-6">
            <p class="font-['Host_Grotesk'] text-[12px] font-bold uppercase tracking-[0.25em] text-[#8f5a3a] mb-3">Metadata</p>
            <div class="grid grid-cols-2 gap-4 text-[14px] text-[#5d4a3d]">
                <div>
                    <p class="font-bold">Created:</p>
                    <p>{{ $product->created_at->format('M d, Y \a\t H:i') }}</p>
                </div>
                <div>
                    <p class="font-bold">Last Updated:</p>
                    <p>{{ $product->updated_at->format('M d, Y \a\t H:i') }}</p>
                </div>
                @if ($product->creator)
                    <div>
                        <p class="font-bold">Created By:</p>
                        <p>{{ $product->creator->name }}</p>
                    </div>
                @endif
                @if ($product->updater)
                    <div>
                        <p class="font-bold">Updated By:</p>
                        <p>{{ $product->updater->name }}</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
