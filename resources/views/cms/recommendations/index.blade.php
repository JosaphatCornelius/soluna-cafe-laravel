@extends('layouts.cms')

@section('title', 'Recommendations')

@section('content')
    <section class="space-y-6">
        @if ($message = session('success'))
            <div class="rounded-lg bg-green-50 border border-green-200 p-4 text-green-700">
                {{ $message }}
            </div>
        @endif

        <div class="flex items-center justify-between">
            @include('components.cms.section-header', [
                'eyebrow' => 'Manage Homepage',
                'title' => 'Recommendations',
                'description' => 'Items shown in the homepage recommendation carousel.',
            ])

            <a href="{{ route('cms.recommendations.create') }}" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-6 rounded-lg">
                + Add Recommendation
            </a>
        </div>

        <div class="rounded-[22px] border border-[#e5dbcf] bg-white overflow-hidden">
            <div class="grid grid-cols-[2fr_1fr] gap-4 bg-[#f6efe4] px-5 py-4 font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.25em] text-[#8f5a3a]">
                <div>Name</div>
                <div>Action</div>
            </div>

            <div class="divide-y divide-[#e5dbcf]">
                @forelse ($recommendations as $recommendation)
                    <div class="grid grid-cols-[2fr_1fr] gap-4 px-5 py-5 items-center">
                        <div>
                            <p class="font-['Host_Grotesk'] font-bold text-[16px] text-[#241810]">{{ $recommendation->name }}</p>
                            <p class="mt-1 text-[14px] text-[#5d4a3d]">{{ Str::limit($recommendation->image_url, 60) }}</p>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('cms.recommendations.edit', $recommendation->id) }}" class="inline-block rounded-lg bg-amber-600 text-white font-bold py-2 px-4 text-[12px] hover:bg-amber-700">Edit</a>
                            <form action="{{ route('cms.recommendations.destroy', $recommendation->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this recommendation?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-lg bg-red-600 text-white font-bold py-2 px-4 text-[12px] hover:bg-red-700">Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="px-5 py-8 text-center text-[#5d4a3d]">
                        No recommendations found. <a href="{{ route('cms.recommendations.create') }}" class="text-amber-600 hover:text-amber-700 font-bold">Create one</a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
