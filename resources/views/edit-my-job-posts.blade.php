@extends('layouts.admin')

@section('content')
    <livewire:edit-my-job-posts :jobId="$jobId" />
@endsection
