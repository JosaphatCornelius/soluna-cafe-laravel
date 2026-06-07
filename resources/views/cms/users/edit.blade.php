@extends('layouts.cms')

@section('title', 'Edit ' . $user->name)

@php
    $isSelf = $user->getKey() === auth()->id();
@endphp

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
                <p class="font-['Host_Grotesk'] text-[12px] font-bold uppercase tracking-[0.35em] text-[#8f5a3a]">Edit User</p>
                <h1 class="mt-2 font-['Host_Grotesk'] text-[32px] font-bold text-[#241810]">{{ $user->name }}</h1>
            </div>
            <a href="{{ route('cms.users.index') }}" class="text-amber-600 hover:text-amber-700 font-bold">← Back to list</a>
        </div>

        <div class="rounded-[22px] border border-[#dbcdbd] bg-white p-8">
            <form action="{{ route('cms.users.update', $user->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block font-['Host_Grotesk'] font-bold text-[14px] text-[#241810] mb-2">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-3 border border-[#d8c9b7] rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500" />
                </div>

                <div>
                    <label for="email" class="block font-['Host_Grotesk'] font-bold text-[14px] text-[#241810] mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-3 border border-[#d8c9b7] rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500" />
                </div>

                <div>
                    <label for="role" class="block font-['Host_Grotesk'] font-bold text-[14px] text-[#241810] mb-2">Role</label>
                    @if ($isSelf)
                        <input type="hidden" name="role" value="{{ $user->role }}" />
                        <input type="text" value="{{ $user->role === 'admin' ? 'Admin' : 'User (view-only)' }}" disabled class="w-full px-4 py-3 border border-[#d8c9b7] rounded-lg bg-[#f3ede4] text-[#5d4a3d]" />
                        <p class="mt-2 text-[13px] text-[#8f5a3a]">You cannot change your own role.</p>
                    @else
                        <select name="role" id="role" class="w-full px-4 py-3 border border-[#d8c9b7] rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500">
                            <option value="user" @selected(old('role', $user->role) === 'user')>User (view-only)</option>
                            <option value="admin" @selected(old('role', $user->role) === 'admin')>Admin</option>
                        </select>
                    @endif
                </div>

                <div>
                    <label for="password" class="block font-['Host_Grotesk'] font-bold text-[14px] text-[#241810] mb-2">New Password</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-3 border border-[#d8c9b7] rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500" />
                    <p class="mt-2 text-[13px] text-[#5d4a3d]">Leave blank to keep the current password.</p>
                </div>

                <div>
                    <label for="password_confirmation" class="block font-['Host_Grotesk'] font-bold text-[14px] text-[#241810] mb-2">Confirm New Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-3 border border-[#d8c9b7] rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500" />
                </div>

                <div class="pt-4 border-t border-[#e5dbcf]">
                    <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-6 rounded-lg">Save User</button>
                    <a href="{{ route('cms.users.index') }}" class="ml-4 inline-block text-[#5d4a3d] hover:text-[#241810]">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection
