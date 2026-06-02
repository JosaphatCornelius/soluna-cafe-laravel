@extends('layouts.cms')

@section('title', 'Edit ' . $content->title)

@section('content')
    <section class="space-y-6">
        @if ($errors->any())
            <div class="rounded-lg bg-red-50 border border-red-200 p-4">
                <p class="font-bold text-red-700 mb-2">Please fix the following errors:</p>
                <ul class="list-disc list-inside text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex items-center justify-between">
            <div>
                <p class="font-['Host_Grotesk'] text-[12px] font-bold uppercase tracking-[0.35em] text-[#8f5a3a]">Edit Content</p>
                <h1 class="mt-2 font-['Host_Grotesk'] text-[32px] font-bold text-[#241810]">{{ $content->title }}</h1>
            </div>
            <a href="{{ route('cms.content.index') }}" class="text-amber-600 hover:text-amber-700 font-bold">
                ← Back to list
            </a>
        </div>

        <div class="rounded-[22px] border border-[#dbcdbd] bg-white p-8">
            <form action="{{ route('cms.content.update', $content->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block font-['Host_Grotesk'] font-bold text-[14px] text-[#241810] mb-2">
                        Title
                    </label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title', $content->title) }}"
                        class="w-full px-4 py-3 border border-[#d8c9b7] rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                    />
                </div>

                <div>
                    <label for="description" class="block font-['Host_Grotesk'] font-bold text-[14px] text-[#241810] mb-2">
                        Description
                    </label>
                    <textarea
                        name="description"
                        id="description"
                        rows="8"
                        class="w-full px-4 py-3 border border-[#d8c9b7] rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                    >{{ old('description', $content->description) }}</textarea>
                </div>

                <div class="pt-4 border-t border-[#e5dbcf]">
                    <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-6 rounded-lg">
                        Save Changes
                    </button>
                    <a href="{{ route('cms.content.index') }}" class="ml-4 inline-block text-[#5d4a3d] hover:text-[#241810]">
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        <div class="rounded-[22px] border border-[#e5dbcf] bg-[#f9f6f2] p-6">
            <p class="font-['Host_Grotesk'] text-[12px] font-bold uppercase tracking-[0.25em] text-[#8f5a3a] mb-3">Metadata</p>
            <div class="grid grid-cols-2 gap-4 text-[14px] text-[#5d4a3d]">
                <div>
                    <p class="font-bold">Page key (slug):</p>
                    <p>{{ $content->slug }}</p>
                </div>
                <div>
                    <p class="font-bold">Created:</p>
                    <p>{{ $content->created_at->format('M d, Y \a\t H:i') }}</p>
                </div>
                <div>
                    <p class="font-bold">Last Updated:</p>
                    <p>{{ $content->updated_at->format('M d, Y \a\t H:i') }}</p>
                </div>
                @if ($content->creator)
                    <div>
                        <p class="font-bold">Created By:</p>
                        <p>{{ $content->creator->name }}</p>
                    </div>
                @endif
                @if ($content->updater)
                    <div>
                        <p class="font-bold">Updated By:</p>
                        <p>{{ $content->updater->name }}</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
