@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-6">📋 Job Applications</h2>
    @livewire('job-search-apply')
    @livewire('job-apply-list')
    @livewire('job-apply-view')
@endsection
