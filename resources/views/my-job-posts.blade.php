@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold">My Job Posts</h2>
    <p class="text-sm text-gray-600 mb-6">Manage and review your job postings</p>
    @livewire('job-search-my-posts')
    <livewire:my-job-posts />
    <livewire:view-my-job-posts />
@endsection
