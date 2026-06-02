@extends('layouts.cms')

@section('title', 'Contact Messages')

@section('content')
    <section class="space-y-6">
        @if ($message = session('success'))
            <div class="rounded-lg bg-green-50 border border-green-200 p-4 text-green-700">
                {{ $message }}
            </div>
        @endif

        <div class="flex items-center justify-between">
            @include('components.cms.section-header', [
                'eyebrow' => 'Manage Messages',
                'title' => 'Contact Messages',
                'description' => 'Review messages submitted from the contact form.',
            ])
        </div>

        <div class="rounded-[22px] border border-[#e5dbcf] bg-white overflow-hidden">
            <div class="grid grid-cols-[2fr_1fr_1fr] gap-4 bg-[#f6efe4] px-5 py-4 font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.25em] text-[#8f5a3a]">
                <div>Sender</div>
                <div>Received</div>
                <div>Action</div>
            </div>

            <div class="divide-y divide-[#e5dbcf]">
                @forelse ($messages as $message)
                    <div class="grid grid-cols-[2fr_1fr_1fr] gap-4 px-5 py-5 items-center">
                        <div>
                            <p class="font-['Host_Grotesk'] font-bold text-[16px] text-[#241810]">{{ $message->name }}</p>
                            <p class="mt-1 text-[14px] text-[#5d4a3d]">{{ Str::limit($message->message, 60) }}</p>
                        </div>
                        <div class="text-[14px] text-[#5d4a3d]">{{ $message->created_at->format('M d, Y') }}</div>
                        <div class="flex gap-2">
                            <a href="{{ route('cms.contacts.show', $message->id) }}" class="inline-block rounded-lg bg-amber-600 text-white font-bold py-2 px-4 text-[12px] hover:bg-amber-700">View</a>
                            @can('delete', $message)
                                <form action="{{ route('cms.contacts.destroy', $message->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-lg bg-red-600 text-white font-bold py-2 px-4 text-[12px] hover:bg-red-700">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                @empty
                    <div class="px-5 py-8 text-center text-[#5d4a3d]">No messages found.</div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
