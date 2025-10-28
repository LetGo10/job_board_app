@extends('layouts.admin')

@section('content')
    <div>
        <h2 class="text-2xl font-bold text-gray-900">My Job Applications</h2>
        <p class="text-sm text-gray-600 mb-6">List of jobs you have applied for</p>
    </div>

    <livewire:user-job-applied-list />
@endsection
