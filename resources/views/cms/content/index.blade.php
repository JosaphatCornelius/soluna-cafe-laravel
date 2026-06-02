@extends('layouts.cms')

@section('title', 'Content Pages')

@section('content')
    <section class="space-y-6">
        @if ($message = session('success'))
            <div class="rounded-lg bg-green-50 border border-green-200 p-4 text-green-700">
                {{ $message }}
            </div>
        @endif

        <div class="flex items-center justify-between">
            @include('components.cms.section-header', [
                'eyebrow' => 'Manage Content',
                'title' => 'Content Pages',
                'description' => 'Edit the text of the main pages of your website.',
            ])
        </div>

        <div class="rounded-[22px] border border-[#e5dbcf] bg-white overflow-hidden">
            <div class="grid grid-cols-[2fr_1fr_1fr] gap-4 bg-[#f6efe4] px-5 py-4 font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.25em] text-[#8f5a3a]">
                <div>Title</div>
                <div>Created</div>
                <div>Action</div>
            </div>

            <div class="divide-y divide-[#e5dbcf]">
                @forelse ($contents as $content)
                    <div class="grid grid-cols-[2fr_1fr_1fr] gap-4 px-5 py-5 items-center">
                        <div>
                            <p class="font-['Host_Grotesk'] font-bold text-[16px] text-[#241810]">{{ $content->title }}</p>
                            <p class="mt-1 text-[14px] text-[#5d4a3d]">{{ Str::limit($content->description, 60) }}</p>
                        </div>
                        <div class="text-[14px] text-[#5d4a3d]">
                            {{ $content->created_at->format('M d, Y') }}
                        </div>
                        <div class="flex gap-2">
                            @can('update', $content)
                                <a href="{{ route('cms.content.edit', $content->id) }}" class="inline-block rounded-lg bg-amber-600 text-white font-bold py-2 px-4 text-[12px] hover:bg-amber-700">
                                    Edit
                                </a>
                            @else
                                <span class="text-[13px] text-[#9b8b7a]">View only</span>
                            @endcan
                        </div>
                    </div>
                @empty
                    <div class="px-5 py-8 text-center text-[#5d4a3d]">
                        No content pages found.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
