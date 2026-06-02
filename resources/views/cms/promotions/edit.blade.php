@extends('layouts.cms')

@section('title', 'Edit ' . $promotion->title)

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
                <p class="font-['Host_Grotesk'] text-[12px] font-bold uppercase tracking-[0.35em] text-[#8f5a3a]">Edit Promotion</p>
                <h1 class="mt-2 font-['Host_Grotesk'] text-[32px] font-bold text-[#241810]">{{ $promotion->title }}</h1>
            </div>
            <a href="{{ route('cms.promotions.index') }}" class="text-amber-600 hover:text-amber-700 font-bold">← Back to list</a>
        </div>

        <div class="rounded-[22px] border border-[#dbcdbd] bg-white p-8">
            <form action="{{ route('cms.promotions.update', $promotion->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block font-['Host_Grotesk'] font-bold text-[14px] text-[#241810] mb-2">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $promotion->title) }}" class="w-full px-4 py-3 border border-[#d8c9b7] rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500" />
                </div>

                <div>
                    <label for="slug" class="block font-['Host_Grotesk'] font-bold text-[14px] text-[#241810] mb-2">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $promotion->slug) }}" class="w-full px-4 py-3 border border-[#d8c9b7] rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500" />
                </div>

                <div>
                    <label for="description" class="block font-['Host_Grotesk'] font-bold text-[14px] text-[#241810] mb-2">Description</label>
                    <textarea name="description" id="description" rows="8" class="w-full px-4 py-3 border border-[#d8c9b7] rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500">{{ old('description', $promotion->description) }}</textarea>
                </div>

                <div>
                    <label for="image_url" class="block font-['Host_Grotesk'] font-bold text-[14px] text-[#241810] mb-2">Image URL</label>
                    <input type="url" name="image_url" id="image_url" value="{{ old('image_url', $promotion->image_url) }}" class="w-full px-4 py-3 border border-[#d8c9b7] rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500" />
                </div>

                <div class="flex items-center gap-3">
                    <label class="inline-flex items-center gap-2">
                        <input type="checkbox" name="active" value="1" {{ old('active', $promotion->active) ? 'checked' : '' }} class="h-4 w-4 rounded border-[#d8c9b7] text-amber-600 focus:ring-amber-500" />
                        <span class="text-[#241810]">Active</span>
                    </label>
                </div>

                <div class="pt-4 border-t border-[#e5dbcf]">
                    <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-6 rounded-lg">Save Promotion</button>
                    <a href="{{ route('cms.promotions.index') }}" class="ml-4 inline-block text-[#5d4a3d] hover:text-[#241810]">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection
