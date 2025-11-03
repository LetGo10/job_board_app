@extends('layouts.admin')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">All Job Posts Management</h2>
        <p class="text-sm text-gray-600 dark:text-gray-400">Manage and review all job postings from all users</p>
    </div>

    @livewire('admin-job-search')
    @livewire('admin-job-management')
    <livewire:view-my-job-posts />
@endsection
