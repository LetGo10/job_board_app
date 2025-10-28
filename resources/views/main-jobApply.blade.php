@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold">Job Applications</h2>
    <p class="text-sm text-gray-600 mb-6">Manage and review job applications from candidates</p>
    @livewire('job-search-apply')
    @livewire('job-apply-list')
    @livewire('job-apply-view')
@endsection
