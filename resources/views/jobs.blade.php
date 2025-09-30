@extends('layouts.app')

@section('content')
<section class="relative bg-gradient-to-r from-purple-700 via-purple-500 to-pink-500 py-20">
  <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
    <h1 class="text-4xl md:text-5xl font-extrabold text-white">Find Your Perfect Job</h1>
    <p class="mt-4 text-lg text-purple-100 max-w-2xl mx-auto">
      Browse the latest opportunities and apply in just a few clicks.
    </p>
  </div>
</section>

<div class="max-w-7xl mx-auto px-6 lg:px-8 py-12 grid grid-cols-1 lg:grid-cols-4 gap-8">
    <livewire:job-search />
    <livewire:job-list />
    <livewire:job-view />
    <livewire:job-edit />
    <livewire:job-apply />
</div>
@endsection
