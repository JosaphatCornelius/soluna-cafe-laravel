@extends('layouts.cms')

@section('title', 'Message from ' . $message->name)

@section('content')
    <section class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="font-['Host_Grotesk'] text-[12px] font-bold uppercase tracking-[0.35em] text-[#8f5a3a]">Contact Message</p>
                <h1 class="mt-2 font-['Host_Grotesk'] text-[32px] font-bold text-[#241810]">Message from {{ $message->name }}</h1>
            </div>
            <a href="{{ route('cms.contacts.index') }}" class="text-amber-600 hover:text-amber-700 font-bold">← Back to messages</a>
        </div>

        <div class="rounded-[22px] border border-[#dbcdbd] bg-white p-8 space-y-6">
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <p class="text-[14px] font-bold text-[#241810]">Sender</p>
                    <p class="text-[#5d4a3d]">{{ $message->name }}</p>
                </div>
                <div>
                    <p class="text-[14px] font-bold text-[#241810]">Email</p>
                    <p class="text-[#5d4a3d]">{{ $message->email }}</p>
                </div>
            </div>

            <div class="rounded-[20px] border border-[#e5dbcf] bg-[#f9f6f2] p-6">
                <p class="text-[14px] font-bold text-[#241810] mb-3">Message</p>
                <div class="text-[#5d4a3d] whitespace-pre-line">{{ $message->message }}</div>
            </div>

            <div class="grid grid-cols-2 gap-4 text-[14px] text-[#5d4a3d]">
                <div>
                    <p class="font-bold">Received</p>
                    <p>{{ $message->created_at->format('M d, Y \\a\\t H:i') }}</p>
                </div>
                <div>
                    <p class="font-bold">Status</p>
                    <p>{{ ucfirst($message->status) }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
