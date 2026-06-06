@extends('layouts.cms')

@section('title', 'Users')

@php
    $roleLabels = ['admin' => 'Admin', 'user' => 'User (view-only)'];
@endphp

@section('content')
    <section class="space-y-6">
        @if ($message = session('success'))
            <div class="rounded-lg bg-green-50 border border-green-200 p-4 text-green-700">
                {{ $message }}
            </div>
        @endif

        @if ($message = session('error'))
            <div class="rounded-lg bg-red-50 border border-red-200 p-4 text-red-700">
                {{ $message }}
            </div>
        @endif

        <div class="flex items-center justify-between">
            @include('components.cms.section-header', [
                'eyebrow' => 'Manage Users',
                'title' => 'Users',
                'description' => 'Create CMS accounts and manage their name, email, password, and role.',
            ])

            @can('create', App\Models\User::class)
                <a href="{{ route('cms.users.create') }}" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-6 rounded-lg">
                    + Add User
                </a>
            @endcan
        </div>

        <div class="rounded-[22px] border border-[#e5dbcf] bg-white overflow-hidden">
            <div class="grid grid-cols-[2fr_2fr_1fr_1fr] gap-4 bg-[#f6efe4] px-5 py-4 font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.25em] text-[#8f5a3a]">
                <div>Name</div>
                <div>Email</div>
                <div>Role</div>
                <div>Action</div>
            </div>

            <div class="divide-y divide-[#e5dbcf]">
                @forelse ($users as $user)
                    <div class="grid grid-cols-[2fr_2fr_1fr_1fr] gap-4 px-5 py-5 items-center">
                        <div class="font-['Host_Grotesk'] font-bold text-[16px] text-[#241810]">
                            {{ $user->name }}
                            @if ($user->getKey() === auth()->id())
                                <span class="ml-1 text-[12px] font-normal text-[#8f5a3a]">(you)</span>
                            @endif
                        </div>
                        <div class="text-[14px] text-[#5d4a3d] break-all">{{ $user->email }}</div>
                        <div class="text-[14px] text-[#5d4a3d]">{{ $roleLabels[$user->role] ?? $user->role }}</div>
                        <div class="flex gap-2">
                            @can('update', $user)
                                <a href="{{ route('cms.users.edit', $user->id) }}" class="inline-block rounded-lg bg-amber-600 text-white font-bold py-2 px-4 text-[12px] hover:bg-amber-700">Edit</a>
                            @endcan
                            @can('delete', $user)
                                <form action="{{ route('cms.users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-lg bg-red-600 text-white font-bold py-2 px-4 text-[12px] hover:bg-red-700">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                @empty
                    <div class="px-5 py-8 text-center text-[#5d4a3d]">
                        No users found.
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
