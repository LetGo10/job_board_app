@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold">User List</h2>
    <p class="text-sm text-gray-600 mb-6">Manage and review user accounts</p>

    <livewire:user-list />

    {{-- User Profile Modal Component --}}
    <livewire:user-profile-view />
@endsection
