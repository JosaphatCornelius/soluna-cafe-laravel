@extends('layouts.cms')

@section('title', 'Create Product')

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
                <p class="font-['Host_Grotesk'] text-[12px] font-bold uppercase tracking-[0.35em] text-[#8f5a3a]">New Product</p>
                <h1 class="mt-2 font-['Host_Grotesk'] text-[32px] font-bold text-[#241810]">Create Product</h1>
            </div>
            <a href="{{ route('cms.products.index') }}" class="text-amber-600 hover:text-amber-700 font-bold">
                ← Back to list
            </a>
        </div>

        <div class="rounded-[22px] border border-[#dbcdbd] bg-white p-8">
            <form action="{{ route('cms.products.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block font-['Host_Grotesk'] font-bold text-[14px] text-[#241810] mb-2">
                        Product Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
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
                    >{{ old('description') }}</textarea>
                </div>

                <div>
                    <label for="category" class="block font-['Host_Grotesk'] font-bold text-[14px] text-[#241810] mb-2">
                        Category
                    </label>
                    <input
                        type="text"
                        name="category"
                        id="category"
                        value="{{ old('category') }}"
                        class="w-full px-4 py-3 border border-[#d8c9b7] rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                    />
                </div>

                <div>
                    <label for="image_url" class="block font-['Host_Grotesk'] font-bold text-[14px] text-[#241810] mb-2">
                        Image URL
                    </label>
                    <input
                        type="text"
                        name="image_url"
                        id="image_url"
                        value="{{ old('image_url') }}"
                        class="w-full px-4 py-3 border border-[#d8c9b7] rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                    />
                </div>

                <div>
                    <label for="price" class="block font-['Host_Grotesk'] font-bold text-[14px] text-[#241810] mb-2">
                        Price (Rp)
                    </label>
                    <input
                        type="number"
                        name="price"
                        id="price"
                        value="{{ old('price') }}"
                        min="0"
                        class="w-full px-4 py-3 border border-[#d8c9b7] rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500"
                    />
                </div>

                <div class="pt-4 border-t border-[#e5dbcf]">
                    <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-6 rounded-lg">
                        Create Product
                    </button>
                    <a href="{{ route('cms.products.index') }}" class="ml-4 inline-block text-[#5d4a3d] hover:text-[#241810]">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </section>
@endsection
